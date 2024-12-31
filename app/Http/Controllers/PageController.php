<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        //pull all the posts from the database
        $posts = Post::all();
        $posts = $posts->toArray();

        $nested_posts = buildNestedPosts($posts);

        // dd($nested_posts);
        return Inertia::render("Home", [
            'posts' => $nested_posts
        ]);
    }
}
