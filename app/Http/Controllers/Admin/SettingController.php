<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'lead_popup_active' => SiteSetting::get('lead_popup_active', '1'),
            'lead_popup_delay'  => SiteSetting::get('lead_popup_delay', '30'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'lead_popup_active' => 'required|in:0,1',
            'lead_popup_delay'  => 'required|integer|min:1|max:300',
        ]);

        SiteSetting::set('lead_popup_active', $request->lead_popup_active);
        SiteSetting::set('lead_popup_delay', $request->lead_popup_delay);

        return back()->with('success', 'Settings updated successfully.');
    }
}
