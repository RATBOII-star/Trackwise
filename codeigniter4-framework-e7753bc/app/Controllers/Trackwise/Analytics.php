<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\StudySessionModel;

class Analytics extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        service('responsecache')->setTtl(300);

        $model  = new StudySessionModel();
        $stats  = ['sessionCount' => 0, 'hours' => 0, 'streak' => 0, 'focusPct' => 0, 'focusGoal' => 2, 'focusDone' => 0];
        $weekly = ['labels' => [], 'values' => []];
        $subjects = [];
        $recent = [];

        try {
            $stats    = $model->getStats($userId);
            $weekly   = $model->getWeeklyChart($userId);
            $subjects = $model->getSubjectBreakdown($userId);
            $recent   = $model->getRecentSessions($userId, 8);
        } catch (\Throwable $e) {
            log_message('error', 'Analytics: ' . $e->getMessage());
        }

        return view('trackwise/analytics/index', [
            'title'      => 'Analytics — TRACKWISE',
            'pageTitle'  => 'Analytics',
            'stats'      => $stats,
            'weekly'     => $weekly,
            'subjects'   => $subjects,
            'recent'     => $recent,
            'model'      => $model,
            'activeNav'  => 'analytics',
        ]);
    }
}
