<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends BaseController
{
    public function index(Request $request)
    {
        return parent::_view(
            'admin.artisan.index'
        );
    }
    public function command(Request $request, $action = 'cache')
    {
        switch ($action) {
            case 'optimize':
                Artisan::call('optimize', ['--quiet' => true, '--force' => true]);
                Artisan::call('route:cache');
                Artisan::call('view:cache');
                Artisan::call('config:cache');
                break;
            case 'database':
                # code...
                break;
            default:
                Artisan::call('cache:clear');
                Artisan::call('route:cache');
                Artisan::call('view:cache');
                Artisan::call('config:cache');
                break;
        }
        return redirect()->route('admin.artisan.index')->with('_success', __('alert.command.success'));
    }
}
