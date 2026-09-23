<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('blog')
            ->latest()
            ->paginate(10);

        return view('admin.comments.index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->update([
            'approved' => true,
        ]);

        return back()->with('success', 'Comment approved successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}