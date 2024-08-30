<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Marks;
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

    public function posts(request $request)
    {
        $data = $request->validate([
            'tag' => 'nullable|string',
        ]);
        if(!empty($data)){
            $jobs = Post::whereHas('categories', function ($q) {
                $q->where('name', 'Job Offer');
            })->where(function ($subq) use ($data) {
                $subq->whereHas('tags', function ($q) use ($data) {
                    $q->where('tag', $data['tag']);
                });
            })->get();
        }else{
            $jobs = Post::whereHas('categories', function ($q) {
                $q->where('name', 'Job Offer');
            })->get();
        }
        $seekers = Post::whereHas('categories', function ($q) {
            $q->where('name', 'Job Seeker');
        })->get();
        $tags = Tag::all();
        return view('post.main', ['jobs' => $jobs , 'seekers' => $seekers, 'tags' => $tags]);
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
        $user = Auth::user();
        $post = $user->posts()->create($data);
        $post->categories()->attach(Category::findOrFail(1));
        $post->tags()->attach(Tag::findOrFail(1));
        $user->notifications()->create(['text' => "Post created!\nPost id: $post->id"]);


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
        $user->notifications()->create(['text' => "Post created!\nPost id: $post->id"]);

        return redirect('/posts');
    }

    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get(['id', 'title', 'description']);

        return response()->json($posts);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return view('search_results', ['posts' => $posts, 'query' => $query]);
    }

    public function home()
    {
        $userId = Auth::id();
        $savedPosts = Marks::where('user_id', $userId)->with('post')->get();

        $recommendedPost = $savedPosts->isNotEmpty() ? $savedPosts->random()->post : null;

        return view('home', [
            'recommendedPost' => $recommendedPost,
            'posts' => Post::latest()->take(10)->get(),
        ]);
    }
}
