<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public const PATH_IMAGE = 'uploads/designs';
    public function index(Request $request)
    {
        $image     = $request->file('image');
        $file_name = $image->getClientOriginalName();
        $image->move(self::PATH_IMAGE, $file_name);
        return [
            'file_name' => $file_name,
            'path'      => asset(self::PATH_IMAGE) . "/" . $file_name,
        ];
    }
}
