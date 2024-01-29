<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        // $posts = Post::get();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'body'=>'required',
        ]);

        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);

        // return back();

        auth()->user()->posts()->create($request->only('body'));

        return redirect()->route('post')->with('success', 'Post created successfully!');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
