<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule; // validation   
use Illuminate\Support\Facades\Auth;
use App\Models\Listing; // models
use Illuminate\Http\Request; // request is defined
use App\Models\User; // User model for authentication
class ListingController extends Controller
{
    //To display all the gallery listings
   public function index(Request $request)
{
    $query = Listing::query();

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('tags', 'like', '%' . $request->search . '%')
              ->orWhere('location', 'like', '%' . $request->search . '%');
    }

    return view('gallery.index', [
        'listings' => $query->latest()->paginate(6)
    ]);
}

    // To display individual listings
    public function show(Listing $listing){
        if($listing){
            return view('gallery.show', ['listing'=>$listing]); // view has still issue
        }else
            abort(404);
    }
    // Display the gallery creation form   issue
    public function create(){
        return view('gallery.create');
    }

    // Store gallery form to the database
    

public function store(Request $request)
{
    $formFields = $request->validate([
        'name' => 'required',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'location' => 'required',
        'tags' => 'required',
        'description' => 'required'
    ]);

    if ($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('pictures', 'public');
    }

    // Attach logged-in user's ID
    $formFields['user_id'] = auth()->id();

    Listing::create($formFields);

    return redirect('/')->with('message', 'Listing created successfully!');
}

    // Show the listing from
   // Show edit form
public function edit(Listing $listing){
    if ($listing->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('gallery.edit', ['listing' => $listing]);
}

// Update listing
public function update(Request $request, Listing $listing){
    if ($listing->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $formFilds = $request->validate([
        'name'=>'required',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'location' => 'required',
        'tags' => 'required',
        'description' => 'required'
    ]);

    if ($request->hasFile('logo')) {
        $formFilds['logo'] = $request->file('logo')->store('pictures', 'public');
    }

    $listing->update($formFilds);

    return back()->with('message', 'Listing updated successfully!');
}

// Delete listing
public function destroy(Listing $listing){
    if ($listing->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $listing->delete();

    return redirect('/')->with('message', 'Gallery has been deleted successfully!');
}

    // update the listing form 
    //Search for the listings in the gallery
    // public function search(Request $request){
    //     dd($request);
    // }
}
