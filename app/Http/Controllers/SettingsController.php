<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'key' => 'required|string|max:255|unique:settings',
        'value' => 'required|string',
      ]);
       Settings::create([
          'key' => $validatedData['key'],
          'value' => $validatedData['value'],
      ]);
      return redirect()->route('settings')->with('success', 'Setting created successfully.');
    }

    public function update(Request $request, Settings $setting)
    {
      $validatedData = $request->validate([
        'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
        'value' => 'required|string',
      ]);

      $setting->update($validatedData);

      return redirect()->route('settings')->with('success', 'Setting updated successfully.');
    }

    public function destroy(Settings $setting)
    {
      $setting->delete();

      return redirect()->route('settings')->with('success', 'Setting deleted successfully.');
    }
}
