<?php

namespace App\Models\Trackwise;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    public function getProfile(?array $user, array $stats): array
    {
        $username = $user['username'] ?? 'Student';
        $name     = ucfirst($username);
        $email    = $user['email'] ?? ($username . '@trackwise.local');
        $since    = ! empty($user['created_at'])
            ? date('F Y', strtotime($user['created_at']))
            : date('F Y');

        $hours = (float) ($stats['hours'] ?? 0);

        return [
            'name'         => $name,
            'role'         => 'Student',
            'email'        => $email,
            'memberSince'  => $since,
            'streak'       => (int) ($stats['streak'] ?? 0),
            'sessions'     => (int) ($stats['sessionCount'] ?? 0),
            'hoursWeek'    => $hours . 'h',
            'totalHours'   => $hours . 'h',
            'fullSessions' => (int) ($stats['sessionCount'] ?? 0),
            'goalsMet'     => min((int) ($stats['sessionCount'] ?? 0), 12),
            'bestStreak'   => max((int) ($stats['streak'] ?? 0), 0) . ' Days',
        ];
    }

    public function getAchievements(): array
    {
        return [
            ['label' => '7 Day Streak', 'color' => '#fff9c4'],
            ['label' => '100 Hours', 'color' => '#bbdefb'],
            ['label' => 'Best Goal', 'color' => '#e1bee7'],
            ['label' => 'Top Student', 'color' => '#b2dfdb'],
            ['label' => 'Early Bird', 'color' => '#f8bbd0'],
            ['label' => 'Night Owl', 'color' => '#c5cae9'],
        ];
    }

    public function getPreferences(): array
    {
        return [
            ['label' => 'Study Reminders', 'enabled' => true],
            ['label' => 'Fatigue Alerts', 'enabled' => true],
            ['label' => 'Achievement Notifications', 'enabled' => true],
        ];
    }
}
