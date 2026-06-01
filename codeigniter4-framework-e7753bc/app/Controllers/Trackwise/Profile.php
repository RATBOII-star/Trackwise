<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\ProfileModel;
use App\Models\Trackwise\StudySessionModel;
use App\Models\UserModel;

class Profile extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $profileModel = new ProfileModel();
        $studyModel   = new StudySessionModel();
        $userModel    = new UserModel();

        $stats = ['sessionCount' => 0, 'hours' => 0, 'streak' => 0];
        try {
            $stats = $studyModel->getStats($userId);
        } catch (\Throwable $e) {
            log_message('error', 'Profile stats: ' . $e->getMessage());
        }

        $user = $userModel->select('username, email, created_at')->find($userId);

        return view('trackwise/profile/index', [
            'title'        => 'Profile — TRACKWISE',
            'pageTitle'    => 'Profile',
            'profile'      => $profileModel->getProfile($user, $stats),
            'achievements' => $profileModel->getAchievements(),
            'preferences'  => $profileModel->getPreferences(),
            'activeNav'    => 'profile',
        ]);
    }
}
