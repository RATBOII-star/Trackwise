<?php

namespace App\Controllers\Trackwise;

use App\Controllers\BaseController;

abstract class BaseTrackwiseController extends BaseController
{
    protected function requireAuth(): ?int
    {
        if (! session()->get('isLoggedIn')) {
            return null;
        }

        $userId = (int) session()->get('userId');

        if ($userId < 1) {
            $model = new \App\Models\UserModel();
            $user  = $model->findByUsername((string) session()->get('username'));
            if ($user) {
                $userId = (int) $user['id'];
                session()->set('userId', $userId);
            }
        }

        return $userId > 0 ? $userId : null;
    }
}
