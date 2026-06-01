<?php

namespace App\Models\Trackwise;

use CodeIgniter\Model;

class GoalModel extends Model
{
    protected $table            = 'goals';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'user_id', 'title', 'category', 'target_value', 'current_value',
        'unit', 'color', 'due_date', 'is_completed',
    ];
    protected $useTimestamps = true;

    private array $categoryMeta = [
        'Time'        => ['unit' => 'hours', 'color' => '#42a5f5'],
        'Consistency' => ['unit' => 'days', 'color' => '#ff7043'],
        'Sessions'    => ['unit' => 'sessions', 'color' => '#66bb6a'],
        'Learning'    => ['unit' => 'techniques', 'color' => '#ab47bc'],
    ];

    public function getCategories(): array
    {
        return array_keys($this->categoryMeta);
    }

    public function getMetaForCategory(string $category): array
    {
        return $this->categoryMeta[$category] ?? ['unit' => 'hours', 'color' => '#2a7a78'];
    }

    public function getSummary(int $userId): array
    {
        $goals = $this->where('user_id', $userId)->findAll();
        $total = count($goals);
        $done  = count(array_filter($goals, static fn ($g) => ! empty($g['is_completed'])));

        return [
            'completed' => $done,
            'total'     => $total,
            'pct'       => $total > 0 ? (int) round(($done / $total) * 100) : 0,
        ];
    }

    public function getActiveGoals(int $userId, StudySessionModel $sessionModel): array
    {
        $rows = $this->where('user_id', $userId)
            ->where('is_completed', 0)
            ->orderBy('due_date', 'ASC')
            ->findAll();

        $sessionStats = $this->getSessionStats($userId, $sessionModel);
        $out          = [];

        foreach ($rows as $row) {
            $current = $this->resolveCurrentValue($row, $sessionStats);
            $target  = (float) $row['target_value'];
            $pct     = $target > 0 ? (int) min(100, round(($current / $target) * 100)) : 0;

            if ($pct >= 100 && ! $row['is_completed']) {
                $this->update($row['id'], ['is_completed' => 1, 'current_value' => $current]);
                continue;
            }

            $out[] = [
                'id'       => $row['id'],
                'title'    => $row['title'],
                'date'     => $row['due_date'] ? date('M j, Y', strtotime($row['due_date'])) : 'No due date',
                'category' => $row['category'],
                'current'  => $current,
                'target'   => $target,
                'unit'     => $row['unit'],
                'pct'      => $pct,
                'color'    => $row['color'],
            ];
        }

        return $out;
    }

    public function getMilestones(int $userId, StudySessionModel $sessionModel): array
    {
        $milestones = [];

        try {
            $sessions = $sessionModel->select('created_at, hours, minutes')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'ASC')
                ->findAll();

            if ($sessions === []) {
                return [['text' => 'Log your first study session to unlock milestones', 'time' => '']];
            }

            $first = $sessions[0];
            $milestones[] = [
                'text' => 'First study session logged',
                'time' => $this->timeAgo($first['created_at']),
            ];

            $totalHours = 0;
            foreach ($sessions as $s) {
                $totalHours += (int) $s['hours'] + ((int) $s['minutes'] / 60);
                if ($totalHours >= 20 && ! isset($milestones['20h'])) {
                    $milestones['20h'] = [
                        'text' => 'Completed 20 hours milestone',
                        'time' => $this->timeAgo($s['created_at']),
                    ];
                }
                if ($totalHours >= 30 && ! isset($milestones['30h'])) {
                    $milestones['30h'] = [
                        'text' => 'Completed 30 hours milestone',
                        'time' => $this->timeAgo($s['created_at']),
                    ];
                }
            }

            $milestones = array_values($milestones);
        } catch (\Throwable $e) {
            log_message('error', 'Milestones: ' . $e->getMessage());
        }

        return $milestones;
    }

    private function getSessionStats(int $userId, StudySessionModel $sessionModel): array
    {
        $stats = ['hours' => 0.0, 'sessions' => 0, 'streak' => 0];

        try {
            $dbStats = $sessionModel->getStats($userId);
            $stats['hours']     = (float) $dbStats['hours'];
            $stats['sessions']  = (int) $dbStats['sessionCount'];
            $stats['streak']    = (int) $dbStats['streak'];
        } catch (\Throwable $e) {
            log_message('error', 'Goal session stats: ' . $e->getMessage());
        }

        return $stats;
    }

    private function resolveCurrentValue(array $goal, array $sessionStats): float
    {
        return match ($goal['category']) {
            'Time'        => round($sessionStats['hours'], 1),
            'Sessions'    => (float) $sessionStats['sessions'],
            'Consistency' => (float) $sessionStats['streak'],
            default       => (float) $goal['current_value'],
        };
    }

    private function timeAgo(string $datetime): string
    {
        $diff = time() - strtotime($datetime);
        if ($diff < 86400) {
            return 'Today';
        }
        if ($diff < 172800) {
            return '1 day ago';
        }
        if ($diff < 604800) {
            return (int) floor($diff / 86400) . ' days ago';
        }

        return (int) floor($diff / 604800) . ' week(s) ago';
    }
}
