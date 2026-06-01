<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\GoalModel;
use App\Models\Trackwise\StudySessionModel;

class Goals extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $goalModel    = new GoalModel();
        $sessionModel = new StudySessionModel();

        $summary    = ['completed' => 0, 'total' => 0, 'pct' => 0];
        $goals      = [];
        $milestones = [];

        try {
            $summary    = $goalModel->getSummary($userId);
            $goals      = $goalModel->getActiveGoals($userId, $sessionModel);
            $milestones = $goalModel->getMilestones($userId, $sessionModel);
        } catch (\Throwable $e) {
            log_message('error', 'Goals index: ' . $e->getMessage());
            session()->setFlashdata('error', 'Goals table missing. Run: php spark migrate OR import app/Database/trackwise_setup.sql in phpMyAdmin.');
        }

        return view('trackwise/goals/index', [
            'title'      => 'Goals — TRACKWISE',
            'pageTitle'  => 'Goals',
            'summary'    => $summary,
            'goals'      => $goals,
            'milestones' => $milestones,
            'activeNav'  => 'goals',
        ]);
    }

    public function create()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model = new GoalModel();

        return view('trackwise/goals/create', [
            'title'      => 'Create Goal — TRACKWISE',
            'pageTitle'  => 'Create New Goal',
            'categories' => $model->getCategories(),
            'activeNav'  => 'goals',
        ]);
    }

    public function store()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $rules = [
            'title'      => 'required|min_length[3]|max_length[255]',
            'category'   => 'required|in_list[Time,Consistency,Sessions,Learning]',
            'target_value' => 'required|decimal|greater_than[0]',
            'due_date'   => 'permit_empty|valid_date[Y-m-d]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        $model    = new GoalModel();
        $category = $this->request->getPost('category');
        $meta     = $model->getMetaForCategory($category);

        $id = $model->insert([
            'user_id'       => $userId,
            'title'         => $this->request->getPost('title'),
            'category'      => $category,
            'target_value'  => $this->request->getPost('target_value'),
            'current_value' => 0,
            'unit'          => $meta['unit'],
            'color'         => $meta['color'],
            'due_date'      => $this->request->getPost('due_date') ?: null,
            'is_completed'  => 0,
        ]);

        if (! $id) {
            return redirect()->back()->withInput()->with('error', 'Could not save goal. Make sure the goals table exists (run migration or SQL setup).');
        }

        return redirect()->to('/trackwise/goals')->with('message', 'Goal created successfully!');
    }
}
