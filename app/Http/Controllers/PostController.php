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
        return view('post.options');
    }

    public function posts()
    {
        $post = Post::all();
        return view('post.main', ['posts' => $post]);
    }

    public function post($id)
    {
        $post = Post::findOrFail($id);
        return view('post.post', ['post' => $post]);
    }


    public function companyForm()
    {
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

        return redirect('/posts');
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

        return redirect('/posts');
    }

}
