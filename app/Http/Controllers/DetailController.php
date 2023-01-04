<?php

namespace App\Http\Controllers;

use App\Models\Designs;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail(Designs $design)
    {
        return view(
            'front.design.detail',
            [
                'design' => $design
            ]
        );
    }
}
