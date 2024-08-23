<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        //TODO:Look for possible change for better checking and updating
        $user = Auth::user();
        $company = $user->company()->create($data);
        $user->company_id = $company->id;
        $user->save();

        return redirect('/post/create/company');
    }
}
