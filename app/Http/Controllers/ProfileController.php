<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Return the profile view, passing the user data
        return view('users.profile', compact('user'));
    }

    /**
     * Show the admin dashboard.
     */
    public function admin()
    {
        // Make sure only admins can access the admin panel
        if (!auth()->user() || !auth()->user()->is_admin) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Get all users and listings, or any data you'd like to show in the admin panel
        $users = User::all();
        $listings = \App\Models\Listing::all();

        // Return the admin dashboard view, passing the data
        return view('admin.dashboard', compact('users', 'listings'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = auth()->user();

        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'description' => 'nullable|string|max:500',
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $user->update($formFields);

        return back()->with('message', 'Profiel succesvol aangepast.');
    }
}
