<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::where('role', 'visitor');

        // Handle search
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $visitors = $query->get();
        return view('admin.user.user-visitor-index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     * DITIADAKAN
     */
    public function create()
    {
        abort(404); // atau return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     * DITIADAKAN
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $visitor = User::where('role', 'visitor')->findOrFail($id);
        // return view('visitors.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $visitor = User::where('role', 'visitor')->findOrFail($id);
        // return view('visitors.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visitor = User::where('role', 'visitor')->findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $id,
            'img'         => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $visitor->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'img'         => $request->img ?? $visitor->img,
            'description' => $request->description ?? $visitor->description,
        ]);

        return redirect()->route('admin.visitors.index')->with('success', 'Visitor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visitor = User::where('role', 'visitor')->findOrFail($id);
        $visitor->delete();

        return redirect()->route('admin.visitors.index')->with('success', 'Visitor berhasil dihapus.');
    }
}
