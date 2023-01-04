<?php

namespace App\Http\Controllers;

use App\Models\Settings;

class BaseController extends Controller
{
    public function setting()
    {
        $setting = Settings::first();
        return $setting;
    }
    public function _view($view = null, $data = [], $mergeData = [])
    {
        $data['setting'] = $this->setting();
        return view($view, $data, $mergeData);
    }
}
