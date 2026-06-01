<?php

namespace App\Models\Trackwise;

use CodeIgniter\Model;

class PlannerModel extends Model
{
    private function defaultTasks(): array
    {
        return [
            ['id' => 0, 'title' => 'Study Calculus', 'category' => 'Math', 'time' => '9:00 AM', 'done' => false],
            ['id' => 1, 'title' => 'Physics Lab Report', 'category' => 'Physics', 'time' => '2:00 PM', 'done' => true],
            ['id' => 2, 'title' => 'Read Chapter 3', 'category' => 'Biology', 'time' => '4:30 PM', 'done' => false],
            ['id' => 3, 'title' => 'Read Chapter 5', 'category' => 'English', 'time' => '7:00 PM', 'done' => false],
        ];
    }

    public function getCalendarInfo(): array
    {
        $now   = time();
        $start = strtotime('monday this week', $now);
        $days  = [];

        for ($i = 0; $i < 7; $i++) {
            $ts     = strtotime("+{$i} days", $start);
            $days[] = [
                'abbr'   => date('D', $ts),
                'date'   => (int) date('j', $ts),
                'active' => date('Y-m-d', $ts) === date('Y-m-d', $now),
            ];
        }

        return [
            'month' => date('F Y', $now),
            'week'  => 'Week ' . date('W', $now),
            'days'  => $days,
        ];
    }

    public function getTodayTasks(): array
    {
        $tasks = session()->get('planner_tasks');

        if (! is_array($tasks) || $tasks === []) {
            $tasks = $this->defaultTasks();
            session()->set('planner_tasks', $tasks);
        }

        return $tasks;
    }

    public function toggleTask(int $taskId): void
    {
        $tasks = $this->getTodayTasks();

        foreach ($tasks as &$task) {
            if ((int) $task['id'] === $taskId) {
                $task['done'] = ! $task['done'];
                break;
            }
        }

        session()->set('planner_tasks', $tasks);
    }

    public function getProgress(): array
    {
        $tasks = $this->getTodayTasks();
        $done  = count(array_filter($tasks, static fn ($t) => ! empty($t['done'])));
        $total = count($tasks);

        return [
            'completed' => $done,
            'total'     => $total,
            'pct'       => $total > 0 ? (int) round(($done / $total) * 100) : 0,
        ];
    }

    public function getUpcomingDeadline(): array
    {
        return [
            'title' => 'Math Assignment due in 2 days',
        ];
    }
}
