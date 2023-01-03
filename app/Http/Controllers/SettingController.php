<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.setting.index');
    }
    public function change_password(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if ($data['new_password'] != $data['confirm_password']) {
            return redirect()->back()->withInput()->with('_confirm_password', 'Re-entered password does not match.');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user->password = Hash::make($data['new_password']);
            $user->save();
            return redirect()->route('admin.setting.index')->with('_success', __('alert.update.success'));
        } else {
            return redirect()->back();
        }
    }
}
