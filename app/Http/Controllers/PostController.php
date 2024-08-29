<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use App\Models\Tag;
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

    public function posts(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $posts = Post::where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->get();
        } else {
            $posts = Post::all();
        }

        return view('post.main', ['posts' => $posts]);
    }

    public function post($id)
    {
        $post = Post::findOrFail($id);
        $type = $post->categories->first()->name;
        $tags = $post->tags;
        return view('post.post', ['post' => $post, 'type' => $type, 'tags' => $tags]);
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
        $post = auth()->user()->posts()->create($data);
        $post->categories()->attach(Category::findOrFail(1));
        $post->tags()->attach(Tag::findOrFail(1));

        return redirect('/posts');
    }

    public function lookingForWork(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'work_time' => 'required',
            'age' => 'required',
        ]);

        $user = auth()->user();
        $user->age = $data['age'];
        $user->save();
        $post = $user->posts()->create($data);
        $post->categories()->attach(Category::findOrFail(2));

        return redirect('/posts');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        return redirect()->route('jobs', ['query' => $query]);
    }

}
