<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('create.options');
    }

    public function listing(Request $request){
        //job listing
    }

    public function lookingForWork(Request $request){
        //looking for work?
    }

}
