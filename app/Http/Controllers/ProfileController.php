<?php

namespace App\Http\Controllers;

use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile
     */
    public function show()
    {
        $profile = Auth::user()->studentProfile;
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for creating a new profile
     */
    public function create()
    {
        // Check if user already has a profile
        if (Auth::user()->studentProfile) {
            return redirect()->route('profile.show')->with('info', 'You already have a profile. You can edit it below.');
        }

        return view('profile.create');
    }

    /**
     * Store a newly created profile
     */
    public function store(Request $request)
    {
        // Check if user already has a profile
        if (Auth::user()->studentProfile) {
            return redirect()->route('profile.show')->with('error', 'You already have a profile.');
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date|before:today',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'highest_qualification' => 'nullable|string|max:255',
            'year_of_passing' => 'nullable|integer|min:1950|max:' . date('Y'),
            'university_institute' => 'nullable|string|max:255',
            'current_organization' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|integer|min:0|max:50',
            'skills' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $profileData = $request->all();
        $profileData['user_id'] = Auth::id();

        StudentProfile::create($profileData);

        return redirect()->route('profile.show')->with('success', 'Profile created successfully!');
    }

    /**
     * Show the form for editing the profile
     */
    public function edit()
    {
        $profile = Auth::user()->studentProfile;

        if (!$profile) {
            return redirect()->route('profile.create')->with('info', 'Please create your profile first.');
        }

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the profile
     */
    public function update(Request $request)
    {
        $profile = Auth::user()->studentProfile;

        if (!$profile) {
            return redirect()->route('profile.create')->with('error', 'Profile not found.');
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date|before:today',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'highest_qualification' => 'nullable|string|max:255',
            'year_of_passing' => 'nullable|integer|min:1950|max:' . date('Y'),
            'university_institute' => 'nullable|string|max:255',
            'current_organization' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|integer|min:0|max:50',
            'skills' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $profile->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    /**
     * Delete the profile
     */
    public function destroy()
    {
        $profile = Auth::user()->studentProfile;

        if (!$profile) {
            return redirect()->route('dashboard')->with('error', 'Profile not found.');
        }

        $profile->delete();

        return redirect()->route('dashboard')->with('success', 'Profile deleted successfully!');
    }
}
