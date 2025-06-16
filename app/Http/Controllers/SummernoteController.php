<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SummernoteController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('summernote', 'public');
            $url = asset('storage/' . $path);
            return response()->json(['url' => $url]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    }
} 