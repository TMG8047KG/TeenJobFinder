<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\text;

class PostController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('post.options');
        }
        return redirect('/profile');
    }

    public function posts()
    {
        $post = Post::all();
        return view('jobs', ['posts' => $post]);
    }

    public function companyForm()
    {
        if(Auth::user()->company_id == 0){
            return redirect('/company/create');
        }
        return view('post.company');
    }
    public function userForm()
    {
        return view('post.user');
    }

    public function listing(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'work_time' => 'required',
            'salary' => 'min:2',
        ]);
        $data['tag_id'] = 1;

        auth()->user()->posts()->create($data);

        return redirect('/jobs');
    }

    public function lookingForWork(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'work_time' => 'required',
        ]);
        $data['tag_id'] = 2;

        auth()->user()->posts()->create($data);

        return redirect('/jobs');
    }
}
