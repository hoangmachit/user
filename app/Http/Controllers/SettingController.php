<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Settings;
use Auth;

class SettingController extends BaseController
{
    public function index(Request $request)
    {
        $setting = Settings::first();
        return parent::_view(
            'admin.setting.index'
        );
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $setting = Settings::first();
        $setting->page_contract = $data['page_contract'];
        $setting->page_customer = $data['page_customer'];
        $setting->page_design = $data['page_design'];
        $setting->page_domain = $data['page_domain'];
        $setting->save();
        return redirect()->route('admin.setting.index')->with('_success', __('alert.update.success'));
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
