<?php

namespace App\Controllers\Trackwise;

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        return view('trackwise/welcome/index');
    }
}
