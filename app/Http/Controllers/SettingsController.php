<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Show the settings form
    // Inside SettingsController (for the index method)
    public function index()
    {
        // Retrieve the background color from the settings table
        $backgroundColor = \DB::table('settings')
            ->where('key', 'background_color')
            ->value('value'); // This fetches the value of 'background_color'

        // Pass the background color to the view
        return view('settings.index', compact('backgroundColor'));
    }


    // Handle the update request
    // Inside SettingsController
    public function update(Request $request)
    {
        // Validate the background color input (optional)
        $request->validate([
            'background_color' => 'required|string|size:7', // Assuming hex color code like #ffffff
        ]);

        // Get the input value
        $backgroundColor = $request->input('background_color');

        // Store or update the background color in the settings table
        \DB::table('settings')->updateOrInsert(
            ['key' => 'background_color'],  // Condition to check if the setting already exists
            ['value' => $backgroundColor]   // Value to update or insert
        );

        // Redirect back to the settings page with a success message
        return redirect()->route('settings')->with('success', 'Background color updated successfully.');
    }

}
