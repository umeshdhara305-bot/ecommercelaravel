<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }
$setting->site_name = $request->site_name;
$setting->address = $request->address;
$setting->city = $request->city;
$setting->country = $request->country;
$setting->mobile = $request->mobile;
$setting->fax = $request->fax;
$setting->email = $request->email;
        $setting->save();

        return back()->with('success', 'Settings Updated');
    }
}