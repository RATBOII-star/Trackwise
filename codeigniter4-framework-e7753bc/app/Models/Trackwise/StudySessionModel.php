<?php

namespace App\Models\Trackwise;

use CodeIgniter\Model;

class StudySessionModel extends Model
{
    protected $table            = 'study_sessions';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'subject', 'topic', 'hours', 'minutes', 'notes', 'image'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = '';
    protected $dateFormat       = 'datetime';

    public function getSubjects(): array
    {
        return ['Math', 'Physics', 'Biology', 'English', 'Science', 'Chemistry'];
    }

    public function getStats(int $userId): array
    {
        $builder = $this->builder();
        $builder->select('hours, minutes, created_at')
            ->where('user_id', $userId);

        $rows = $builder->get()->getResultArray();

        $totalMinutes = 0;
        foreach ($rows as $row) {
            $totalMinutes += ((int) $row['hours'] * 60) + (int) $row['minutes'];
        }

        $hoursWeek    = round($totalMinutes / 60, 1);
        $sessionCount = count($rows);
        $focusGoal    = 2;
        $focusDone    = min($hoursWeek, $focusGoal);
        $focusPct     = $focusGoal > 0 ? (int) min(100, round(($focusDone / $focusGoal) * 100)) : 0;
        $streak       = $this->calculateStreak($rows);

        return [
            'streak'       => $streak,
            'hours'        => $hoursWeek,
            'goals'        => min($sessionCount, 8) . ' / 8',
            'focusGoal'    => $focusGoal,
            'focusDone'    => $focusDone,
            'focusPct'     => $focusPct,
            'sessionCount' => $sessionCount,
            'totalMinutes' => $totalMinutes,
        ];
    }

    public function getWeeklyChart(int $userId): array
    {
        $labels  = [];
        $values  = [];
        $dayKeys = [];

        for ($i = 6; $i >= 0; $i--) {
            $date      = date('Y-m-d', strtotime("-{$i} days"));
            $dayKeys[] = $date;
            $labels[]  = date('D', strtotime($date));
            $values[]  = 0.0;
        }

        $rows = $this->select('hours, minutes, created_at')
            ->where('user_id', $userId)
            ->where('created_at >=', date('Y-m-d 00:00:00', strtotime('-6 days')))
            ->findAll();

        foreach ($rows as $row) {
            $day = date('Y-m-d', strtotime($row['created_at']));
            $idx = array_search($day, $dayKeys, true);
            if ($idx !== false) {
                $values[$idx] += (int) $row['hours'] + ((int) $row['minutes'] / 60);
            }
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    public function getSubjectBreakdown(int $userId): array
    {
        $rows = $this->select('subject, hours, minutes')
            ->where('user_id', $userId)
            ->findAll();

        $colors = [
            'Math'      => '#e53935',
            'Science'   => '#fbc02d',
            'Physics'   => '#42a5f5',
            'Biology'   => '#66bb6a',
            'English'   => '#43a047',
            'Chemistry' => '#ab47bc',
        ];

        $totals = [];
        foreach ($rows as $row) {
            $subject = $row['subject'];
            $mins    = ((int) $row['hours'] * 60) + (int) $row['minutes'];
            $totals[$subject] = ($totals[$subject] ?? 0) + $mins;
        }

        if ($totals === []) {
            return [];
        }

        $grand = array_sum($totals);
        $out   = [];
        foreach ($totals as $subject => $mins) {
            $out[] = [
                'subject' => $subject,
                'hours'   => round($mins / 60, 1),
                'pct'     => (int) round(($mins / $grand) * 100),
                'color'   => $colors[$subject] ?? '#2a7a78',
            ];
        }

        usort($out, static fn ($a, $b) => $b['pct'] <=> $a['pct']);

        return $out;
    }

    public function getRecentSessions(int $userId, int $limit = 5): array
    {
        return $this->select('id, subject, topic, hours, minutes, created_at')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll($limit);
    }

    private function calculateStreak(array $rows): int
    {
        if ($rows === []) {
            return 0;
        }

        $dates = [];
        foreach ($rows as $row) {
            $dates[date('Y-m-d', strtotime($row['created_at']))] = true;
        }

        $streak = 0;
        $check  = date('Y-m-d');

        while (isset($dates[$check])) {
            $streak++;
            $check = date('Y-m-d', strtotime($check . ' -1 day'));
        }

        return $streak;
    }

    /**
     * Paginated sessions with optional search (optimized select).
     */
    public function getSessionsForUser(int $userId, ?string $search = null): array
    {
        $this->select('id, subject, topic, hours, minutes, notes, image, created_at')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC');

        if ($search !== null && $search !== '') {
            $this->groupStart()
                ->like('subject', $search)
                ->orLike('topic', $search)
                ->orLike('notes', $search)
                ->groupEnd();
        }

        return $this->paginate(5);
    }

    public function formatDuration(int $hours, int $minutes): string
    {
        $parts = [];
        if ($hours > 0) {
            $parts[] = $hours . 'h';
        }
        if ($minutes > 0) {
            $parts[] = $minutes . 'm';
        }

        return $parts !== [] ? implode(' ', $parts) : '0m';
    }

    public function findForUser(int $id, int $userId): ?array
    {
        return $this->select('id, subject, topic, hours, minutes, notes, image, created_at')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }
}
