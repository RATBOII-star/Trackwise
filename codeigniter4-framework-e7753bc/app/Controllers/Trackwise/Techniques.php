<?php

namespace App\Controllers\Trackwise;

use App\Models\Trackwise\TechniqueModel;

class Techniques extends BaseTrackwiseController
{
    public function index()
    {
        $userId = $this->requireAuth();
        if ($userId === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $model = new TechniqueModel();

        return view('trackwise/techniques/index', [
            'title'       => 'Techniques — TRACKWISE',
            'pageTitle'   => 'Techniques',
            'techniques'  => $model->getTechniques(),
            'tips'        => $model->getTips(),
            'activeNav'   => 'techniques',
            'loadTimerJs' => true,
        ]);
    }
}
