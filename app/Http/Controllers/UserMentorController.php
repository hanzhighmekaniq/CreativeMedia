<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = User::query()->where('role', 'mentor'); // Hanya mentor

        // Search by name/email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by skill ID (pivot table)
        if ($request->filled('skill')) {
            $query->whereHas('skills', function ($q) use ($request) {
                $q->where('skills.id', $request->skill); // Specify table name for id column
            });
        }

        $mentors = $query->latest()->get();
        $skills = Skill::orderBy('name')->get();

        return view('admin.user.user-mentor-index', compact('mentors', 'skills'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('admin.user.user-mentor-create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'img'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'password'    => 'required|min:6',
            'skills'      => 'nullable|array',
            'skills.*'    => 'exists:skills,id',
        ]);

        // Simpan gambar ke storage/app/public/users
        $imagePath = $request->file('img')->store('public/users');
        $imageName = basename($imagePath); // hanya nama file, misal "abc123.jpg"

        // Simpan user
        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'img'         => $imageName,
            'description' => $request->description,
            'role'        => 'mentor', // default role
            'password'    => Hash::make($request->password),
        ]);

        // Simpan relasi skills (pivot table skill_users)
        if ($request->filled('skills')) {
            $user->skills()->sync($request->skills);
        }

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $mentor = User::findOrFail($id);
        // return view('admin.user.user-mentor-show', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mentor = User::findOrFail($id);
        $skills = Skill::all();
        return view('admin.user.user-mentor-edit', compact('mentor', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $mentor = User::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $id,
            'img'         => 'nullable',
            'description' => 'nullable',
            'password'    => 'nullable',
            'skills'      => 'nullable',
            'skills.*'    => 'exists:skills,id',
        ]);

        // Handle file upload jika ada file baru
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($mentor->img && Storage::disk('public')->exists('users/' . $mentor->img)) {
                Storage::disk('public')->delete('users/' . $mentor->img);
            }

            // Simpan gambar baru
            $imgName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('users', $imgName, 'public');
        } else {
            $imgName = $mentor->img; // Tetap pakai gambar lama
        }

        // Update data user
        $mentor->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'img'         => $imgName,
            'description' => $request->description,
            'password'    => $request->password ? Hash::make($request->password) : $mentor->password,
            'role'        => 'mentor',
        ]);

        // Update relasi skills
        if ($request->filled('skills')) {
            $mentor->skills()->sync($request->skills); // perbarui skill-skill
        } else {
            $mentor->skills()->detach(); // hapus semua skill kalau tidak ada yang dipilih
        }

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentor = User::findOrFail($id);

        if ($mentor->role !== 'mentor') {
            return redirect()->route('mentors.index')->with('error', 'Hanya mentor yang dapat dihapus.');
        }

        $mentor->delete();

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor berhasil dihapus.');
    }
}
