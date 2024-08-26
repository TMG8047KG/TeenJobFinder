<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Marks;
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
        return redirect()->back()->with('saved', 'Saved successfully!');
    }
}
