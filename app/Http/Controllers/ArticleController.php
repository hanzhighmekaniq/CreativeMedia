<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $subcategory = $request->input('subcategory');

        $query = Article::with(['category', 'subCategory', 'user']);

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($subcategory) {
            $query->where('sub_category_id', $subcategory);
        }

        $articles = $query->latest()->paginate(10);
        $subcategories = SubCategory::with('category')->where('status', 'active')->orderBy('title')->get();

        return view('admin.article.index', compact('articles', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = SubCategory::with('category')->where('status', 'active')->get();
        return view('admin.article.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/articles', $imageName);
            $data['thumbnail'] = 'articles/' . $imageName;
        }

        $article = Article::create($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $subcategories = SubCategory::with('category')->where('status', 'active')->get();
        return view('admin.article.edit', compact('article', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            // Delete old image
            if ($article->thumbnail) {
                Storage::delete('public/' . $article->thumbnail);
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/articles', $imageName);
            $data['thumbnail'] = 'articles/' . $imageName;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::delete('public/' . $article->thumbnail);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }

    public function subcategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->category_id)
            ->where('status', 'active')
            ->get(['id', 'title']);
        return response()->json($subCategories);
    }
}
