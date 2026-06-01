<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\StudySessionModel;

class Dashboard extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model = new StudySessionModel();
        $stats = ['hours' => 0, 'streak' => 0, 'sessionCount' => 0, 'focusPct' => 0];

        try {
            $stats = $model->getStats($userId);
        } catch (\Throwable $e) {
            log_message('error', 'Dashboard stats: ' . $e->getMessage());
        }

        return view('trackwise/dashboard/index', [
            'title'     => 'Dashboard — TRACKWISE',
            'pageTitle' => 'Dashboard',
            'username'  => session()->get('username') ?? 'User',
            'stats'     => $stats,
            'activeNav' => 'home',
        ]);
    }
}
