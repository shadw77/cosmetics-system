<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Post/index', ['posts' => $posts]);
    }

    public function create()
    {
        return Inertia::render('Post/create');       //references create.vue
    }

    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }

    public function edit(Post $post)
    {
        return Inertia::render('Post/Create', ['post' => $post, 'isUpdating' => true]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('posts.index');
    }
}
