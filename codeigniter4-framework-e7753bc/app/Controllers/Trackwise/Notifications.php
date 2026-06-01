<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\NotificationModel;
use App\Models\Trackwise\StudySessionModel;

class Notifications extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $notifModel = new NotificationModel();
        $studyModel = new StudySessionModel();
        $balance    = $notifModel->getStudyBalance();

        try {
            $breakdown = $studyModel->getSubjectBreakdown($userId);
            if ($breakdown !== []) {
                $balance = [];
                foreach ($breakdown as $item) {
                    $balance[] = [
                        'subject' => $item['subject'],
                        'total'   => $item['hours'] . 'h total',
                        'pct'     => $item['pct'],
                        'color'   => $item['color'],
                    ];
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'Notifications balance: ' . $e->getMessage());
        }

        return view('trackwise/notifications/index', [
            'title'         => 'Notifications — TRACKWISE',
            'pageTitle'     => 'Notifications',
            'notifications' => $notifModel->getNotifications(),
            'balance'       => $balance,
            'activeNav'     => 'notifications',
        ]);
    }
}
