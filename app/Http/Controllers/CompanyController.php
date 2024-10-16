<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index(){
        return view('company.create');
    }

    public function dashboard()
    {
        $company = auth()->user()->company;
        return view('company.company_dashboard', compact('company'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        auth()->user()->company()->create($data);
        auth()->user()->notifications()->create(['text' => "Successfully created your company account!"]);
        return redirect('/post/create/company');
    }

    public function edit()
    {
        $user = Auth::user();
        $company = $user->company; // assuming the user has a company relationship
        return view('company.company_edit', compact('company'));
    }

    public function update(Request $request)
    {

        $company = auth()->user()->company;

        // Validate request data
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate photo
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($company->photo && \Storage::exists('public/' . $company->photo)) {
                \Storage::delete('public/' . $company->photo);
            }

            // Store the new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath; // Update the path in the data array
        }

        // Update company details
        $company->update($data);

        return redirect()->route('company.dashboard')->with('success', 'Company profile updated successfully!');
    }

}
