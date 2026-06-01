<?php

namespace App\Models\Trackwise;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    public function getNotifications(): array
    {
        return [
            [
                'type'    => 'warning',
                'title'   => 'Burnout warning - Science',
                'message' => "You've studied Science for 6 consecutive days. Taking a rest day can improve retention and prevent mental fatigue.",
                'time'    => '1 day ago',
            ],
            [
                'type'    => 'achievement',
                'title'   => 'Achievement Unlocked',
                'message' => "Congratulations! You've completed 20 hours of study this month. Keep up the great work!",
                'time'    => '1 day ago',
            ],
            [
                'type'    => 'streak',
                'title'   => '7-Day Streak!',
                'message' => "Amazing! You've maintained your study streak for 7 days straight. You're on fire!",
                'time'    => '1 day ago',
            ],
            [
                'type'    => 'reminder',
                'title'   => 'Study Reminder',
                'message' => "Don't forget your Physics study session scheduled for 7:00 PM today.",
                'time'    => '1 day ago',
            ],
        ];
    }

    public function getStudyBalance(): array
    {
        return [
            ['subject' => 'Math', 'total' => '4h 30m', 'pct' => 85, 'color' => '#e53935'],
            ['subject' => 'Science', 'total' => '2h 15m', 'pct' => 50, 'color' => '#fbc02d'],
            ['subject' => 'English', 'total' => '1h 00m', 'pct' => 25, 'color' => '#43a047'],
        ];
    }
}
