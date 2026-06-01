<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\PlannerModel;

class Planner extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model = new PlannerModel();

        return view('trackwise/planner/index', [
            'title'     => 'Planner — TRACKWISE',
            'pageTitle' => 'Planner',
            'calendar'  => $model->getCalendarInfo(),
            'tasks'     => $model->getTodayTasks(),
            'progress'  => $model->getProgress(),
            'deadline'  => $model->getUpcomingDeadline(),
            'activeNav' => 'planner',
        ]);
    }

    public function toggle(int $taskId)
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model = new PlannerModel();
        $model->toggleTask($taskId);

        return redirect()->to('/trackwise/planner')->with('message', 'Task updated.');
    }
}
