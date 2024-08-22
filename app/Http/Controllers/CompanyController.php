<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        return view('company.create');
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

        return redirect('/post/create/offer');
    }
}
