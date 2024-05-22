<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment
        ]);

        return to_route('posts.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Comment $comment)
    {
        Gate::authorize("update", $comment);
        return view('posts.comment', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'comment' => ['required'],
        ]);

        $comment->update($validated);
        return to_route('posts.index');
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize("delete", $comment);
        $comment->delete();

        return to_route('posts.index');
    }
}
