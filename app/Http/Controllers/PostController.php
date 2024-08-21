<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('create.options');
        }
        return redirect('/profile');
    }

    public function companyForm()
    {
        if(Auth::user()->company_id == null){
            return redirect('/company/create');
        }
        return view('create.company');
    }
    public function userForm()
    {
        return view('create.user');
    }

    public function listing(Request $request){
        //job listing
    }

    public function lookingForWork(Request $request){
        //looking for work?
    }

}
