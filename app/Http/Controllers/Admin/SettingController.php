<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = SiteSetting::firstOrCreate([]);

        return view('admin.settings.edit', [
            'setting' => $setting,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'telephone' => 'nullable|string|max:50',
            'email_contact' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'lien_facebook' => 'nullable|string|max:255',
            'lien_twitter' => 'nullable|string|max:255',
            'lien_linkedin' => 'nullable|string|max:255',
            'lien_instagram' => 'nullable|string|max:255',
            'seo_titre' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        $setting = SiteSetting::firstOrCreate([]);
        $setting->update($validated);

        return redirect()->route('admin.settings.edit')->with('success', 'Paramètres mis à jour avec succès.');
    }
}