<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // toon alles
    public function index() {

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))
            ->paginate(6)
        ]);
    }

    // toon enkel
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    public function store (Request $request) {
        // dd($request->file('photo'));

        $formFields = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'tags' => 'required',
            'location' => 'required|max:255',
            'description' => 'required',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Verzoek succesvol aangemaakt.');
    }

    public function edit (Listing $listing) {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Ongeauthoriseerde actie');
        }
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update (Request $request, Listing $listing) {
        
        if($listing->user_id != auth()->id()) {
            abort(403, 'Ongeauthoriseerde actie');
        }

        $formFields = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'tags' => 'required',
            'location' => 'required|max:255',
            'description' => 'required',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Verzoek succesvol geupdated.');
    }

    public function destroy(Listing $listing) {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Ongeauthoriseerde actie');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Verzoek succesvol verwijderd');
    }

    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
