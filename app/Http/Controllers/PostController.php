<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view("posts.index", ["posts" => $posts]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return to_route('posts.index');
    }

    public function show(Post $post)
    {
        $comments = Comment::select('comments.*', 'users.name')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('post_id', $post->id)
            ->get();

        return view("posts.show", ["post" => $post, "comments" => $comments]);
    }

    public function edit(Post $post)
    {
        Gate::authorize("update", $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
        ]);

        $post->update($validated);
        return to_route('posts.index');
    }

    public function destroy(Post $post)
    {
        Gate::authorize("delete", $post);
        $post->delete();

        return to_route('posts.index');
    }
}
