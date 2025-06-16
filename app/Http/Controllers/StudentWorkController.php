<?php

namespace App\Http\Controllers;

use App\Models\StudentWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StudentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentWorks = StudentWork::with('user')->latest()->paginate(10);
        return view('admin.student-works.index', compact('studentWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student-works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string'
        ]);

        $imagePath = $request->file('image')->store('student-works', 'public');

        StudentWork::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('admin.student-works.index')
            ->with('success', 'Student work created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentWork $studentWork)
    {
        return view('admin.student-works.show', compact('studentWork'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentWork $studentWork)
    {
        return view('admin.student-works.edit', compact('studentWork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentWork $studentWork)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($studentWork->image);
            
            // Store new image
            $imagePath = $request->file('image')->store('admin.student-works', 'public');
            $studentWork->image = $imagePath;
        }

        $studentWork->name = $request->name;
        $studentWork->description = $request->description;
        $studentWork->save();

        return redirect()->route('student-works.index')
            ->with('success', 'Student work updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentWork $studentWork)
    {
        // Delete image from storage
        Storage::disk('public')->delete($studentWork->image);
        
        $studentWork->delete();

        return redirect()->route('student-works.index')
            ->with('success', 'Student work deleted successfully.');
    }
}
