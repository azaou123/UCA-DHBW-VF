<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        return view('back.settings', compact('settings'));
    }
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $setting)
    {
      return view('back.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $setting)
    {
      $validatedData = $request->validate([
        'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
        'value' => 'required|string',
      ]);

      $setting->update($validatedData);

      return redirect()->route('settings')->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $setting)
    {
      $setting->delete();

      return redirect()->route('settings')->with('success', 'Setting deleted successfully.');
    }

    public function getSettingByKey($key)
    {
        $setting = Settings::where('key', $key)->first();

        return $setting ? $setting->value : null;
    }
}
