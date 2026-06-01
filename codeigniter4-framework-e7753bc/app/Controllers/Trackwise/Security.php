<?php

namespace App\Controllers\Trackwise;

class Security extends BaseTrackwiseController
{
    public function index()
    {
        if ($this->requireAuth() === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        return view('trackwise/security/index', [
            'title'     => 'Security — TRACKWISE',
            'pageTitle' => 'Security',
            'demoInput' => session()->getFlashdata('demoInput') ?? '',
            'escaped'   => session()->getFlashdata('escaped') ?? '',
            'raw'       => session()->getFlashdata('raw') ?? '',
            'activeNav' => 'home',
        ]);
    }

    public function xssTest()
    {
        if ($this->requireAuth() === null) {
            return redirect()->to('/trackwise/auth/login');
        }

        $input = $this->request->getPost('comment') ?? '';

        return redirect()->to('/trackwise/security')->with([
            'demoInput' => $input,
            'raw'       => $input,
            'escaped'   => esc($input, 'html'),
        ]);
    }

    public function csrfDemo()
    {
        return $this->response->setJSON(['status' => 'ok', 'message' => 'CSRF token was valid.']);
    }
}
