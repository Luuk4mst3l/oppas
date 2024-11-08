<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        $users = User::all();
        return view('admin.dashboard', compact('listings', 'users'));
    }

    public function destroyListing($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();
        return redirect()->back()->with('message', 'Aanvraag successvol verwijderd.');
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->blocked = true;
        $user->save();
        return redirect()->back()->with('message', 'Gebruiker succesvol geblokkeerd.');
    }
}