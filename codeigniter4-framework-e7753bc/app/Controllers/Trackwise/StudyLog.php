<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\StudySessionModel;

class StudyLog extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model  = new StudySessionModel();
        $search = $this->request->getGet('search');

        $sessions = [];
        $pager    = null;
        $total    = 0;
        $stats    = [
            'streak' => 0, 'hours' => 0, 'goals' => '0 / 8',
            'focusGoal' => 2, 'focusDone' => 0, 'focusPct' => 0,
        ];

        try {
            $stats = $model->getStats($userId);
        } catch (\Throwable $e) {
            log_message('error', 'Study stats failed: ' . $e->getMessage());
        }

        try {
            $sessions = $model->getSessionsForUser($userId, $search);
            $pager    = $model->pager;
            $pager->setPath(site_url('trackwise/studylog'));
            $total    = $pager->getTotal();
        } catch (\Throwable $e) {
            log_message('error', 'Study sessions query failed: ' . $e->getMessage());
        }

        $latestId = $this->request->getGet('saved');
        $latest   = null;
        if ($latestId) {
            $latest = $model->findForUser((int) $latestId, $userId);
        }

        return view('trackwise/studylog/index', [
            'title'      => 'Study Log — TRACKWISE',
            'pageTitle'  => 'Study Log',
            'stats'      => $stats,
            'subjects'   => $model->getSubjects(),
            'sessions'   => $sessions,
            'pager'      => $pager,
            'total'      => $total,
            'search'     => $search ?? '',
            'latest'     => $latest,
            'model'      => $model,
            'activeNav'  => 'studylog',
        ]);
    }

    public function save()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model = new StudySessionModel();

        $rules = [
            'subject' => 'required|max_length[100]',
            'topic'   => 'required|max_length[255]',
            'hours'   => 'permit_empty|integer',
            'minutes' => 'permit_empty|integer|less_than_equal_to[59]',
            'notes'   => 'permit_empty|max_length[2000]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        $imageName = null;
        $file      = $this->request->getFile('session_image');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $validMime = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (! in_array($file->getMimeType(), $validMime, true)) {
                return redirect()->back()->withInput()->with('error', 'Invalid image type. Use JPG, PNG, GIF, or WebP.');
            }
            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->withInput()->with('error', 'Image must be 2MB or smaller.');
            }

            $uploadPath = WRITEPATH . 'uploads';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $imageName = $file->getRandomName();
            $file->move($uploadPath, $imageName);
        }

        $sessionId = $model->insert([
            'user_id' => $userId,
            'subject' => $this->request->getPost('subject'),
            'topic'   => $this->request->getPost('topic'),
            'hours'   => (int) ($this->request->getPost('hours') ?? 0),
            'minutes' => (int) ($this->request->getPost('minutes') ?? 0),
            'notes'   => $this->request->getPost('notes'),
            'image'   => $imageName,
        ]);

        if (! $sessionId) {
            return redirect()->back()->withInput()->with('error', 'Could not save session. Run database migrations or import trackwise_setup.sql.');
        }

        $redirect = '/trackwise/studylog?saved=' . $sessionId;
        $search   = $this->request->getPost('search_keep');
        if ($search) {
            $redirect .= '&search=' . urlencode($search);
        }

        return redirect()->to($redirect)->with('message', 'Study session saved successfully!');
    }
}
