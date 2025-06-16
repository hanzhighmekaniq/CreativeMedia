<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentReply;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replies = CommentReply::with(['user', 'comment'])
            ->latest()
            ->paginate(10);
        return view('admin.comment-replies.index', compact('replies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'content' => 'required|string|max:1000',
        ]);

        $reply = CommentReply::create([
            'comment_id' => $validated['comment_id'],
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Reply submitted successfully and waiting for approval.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentReply $reply)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $reply->update($validated);

        return redirect()->back()->with('success', 'Reply updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommentReply $reply)
    {
        $reply->delete();
        return redirect()->back()->with('success', 'Reply deleted successfully.');
    }

    public function approve(CommentReply $reply)
    {
        $reply->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Reply approved successfully.');
    }

    public function reject(CommentReply $reply)
    {
        $reply->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Reply rejected successfully.');
    }
}
