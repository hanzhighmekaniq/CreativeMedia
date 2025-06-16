<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SubCategory::with('category');

        // Search by title
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $subCategories = $query->latest()->get();
        $categories = Category::orderBy('title')->get();

        return view('admin.subcategory.index', compact('subCategories', 'categories'));
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
        $request->validate([
            'title' => 'required|string|max:255|unique:sub_categories',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive'
        ]);

        SubCategory::create($request->all());

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub Category created successfully.');
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:active,inactive',
        ]);

        $subCategory = SubCategory::findOrFail($id);

        try {
            $subCategory->update($validated);

            return redirect()
                ->route('admin.subcategories.index')
                ->with('success', 'Sub Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to update sub category. Please try again.')
                ->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub Category deleted successfully.');
    }
}
