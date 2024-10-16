<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Marks;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use function Webmozart\Assert\Tests\StaticAnalysis\boolean;

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

    public function editView($id)
    {
        $post = Post::find($id);
        $tags = array();
        foreach ($post->tags as $tag) {
            $tags[] = $tag->tag;
        }
        $category = $post->categories()->first();
        if(auth()->user()->can('updatePost', $post)){
            return view('post.edit', ['post' => $post, 'category' => $category, 'tags' => $tags]);
        }
        abort(403);
    }

    public function edit(Request $request, $id){
        $post = Post::find($id);

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'skills' => ['required'],
            'work_time' => ['required','lte:24'],
            'salary' => ['min:2'],
            'tags' => ['required', 'array']
        ]);

        $user = Auth::user();
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->skills = $data['skills'];
        $post->work_time = $data['work_time'];
        $post->salary = $data['salary'];
        DB::table('post_tags')->where('post_id', $post->id)->delete();
        if($data['tags']!=null){
            foreach($data['tags'] as $tag){
                $post->tags()->attach(Tag::select('id')->where('tag', $tag)->first());
            }
        }
        $post->save();
        $user->notifications()->create(['text' => "Updated post with id: $post->id!"]);

        return redirect('/posts/'.$post->id);
    }

    public function companyForm()
    {
        $tags = Tag::all();
        return view('post.company', ['tags' => $tags]);
    }
    public function userForm()
    {
        return view('post.user');
    }

    public function listing(Request $request){

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'skills' => ['required'],
            'work_time' => ['required','lte:24'],
            'salary' => ['min:2'],
            'tags' => ['required', 'array']
        ]);

        $user = Auth::user();
        $post = $user->posts()->create($data);
        $post->categories()->attach(Category::findOrFail(1));
        //TODO:Add the dropdown thing
        if($data['tags']!=null){
            foreach($data['tags'] as $tag){
                $post->tags()->attach(Tag::select('id')->where('tag', $tag)->first());
            }
        }
        $user->notifications()->create(['text' => "Post created!\nPost id: $post->id"]);


        return redirect('/posts');
    }

    public function lookingForWork(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'skills' => ['required'],
            'work_time' => ['required','lte:24'],
        ]);

        $user = auth()->user();
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

    public function delete($id)
    {
        auth()->user()->posts()->findOrFail($id)->delete();
        auth()->user()->notifications()->create(['text' => "Post with id $id was deleted!"]);

        return redirect('/posts');
    }

    public function home()
    {
        if (auth()->check()) {
            $userId = Auth::id();
            $savedPosts = Marks::where('user_id', $userId)->with('post')->get();

            // Check if there are saved posts and randomly pick one for recommendation
            $recommendedPost = $savedPosts->isNotEmpty() ? $savedPosts->random()->post : null;
        } else {
            $recommendedPost = null;
        }

        // Fetch the latest posts
        $posts = Post::latest()->take(10)->get();

        return view('home', [
            'recommendedPost' => $recommendedPost,
            'posts' => $posts,
        ]);
    }
}
