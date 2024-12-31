<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function create(Request $request) {
        // dd($request->all());

        //validate the content to be required and a string
        $request->validate([
            'content' => 'required|string'
        ],
        [
            'content.required' => 'Please enter some content for your post.'
        ]);


        //create a new post
        $post = new Post();
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->back()->with('success', 'Post created successfully.');
        
    }

    public function delete(Request $request) {
        // dd($request->all());

        $post_id = $request['id'];
        // dd($post_id);

        //find the post
        $post = Post::find($post_id);

        // dd($post);

        //check if the post exists
        if(!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        //check if the user is the owner of the post
        if($post->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this post.');
        }

        //delete the post
        $post->delete();

        // return redirect()->back()->with('success', 'Post deleted successfully.');
        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }
}
