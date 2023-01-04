<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designs;
use App\Models\Contracts;
use App\Models\Customers;
use App\Models\Domains;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return parent::_view(
            'home',
            [
                'total' => [
                    'domain' => Domains::count(),
                    'design' => Designs::count(),
                    'contract' => Contracts::count(),
                    'customer' => Customers::count()
                ]
            ]
        );
    }
}
