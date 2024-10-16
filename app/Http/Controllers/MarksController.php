<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarksController extends Controller
{
    public function action(Request $request){
        $post = Post::findOrFail($request->id);
        $save = Marks::where(['user_id' => Auth::id(), 'post_id' => $post->id])->get();
        if($save->isEmpty()){
            Marks::create(['user_id' => Auth::id(), 'post_id' => $post->id]);
        }else{
            Marks::find($save[0]->id)->delete();
        }
        $user = auth()->user()->username;
        $post->user->notifications()->create(['text' => "$user liked your post! Post id: $post->id"]);
        return redirect()->back()->with('saved', 'Saved successfully!');
    }
}
