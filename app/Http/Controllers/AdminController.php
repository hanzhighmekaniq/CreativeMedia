<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalCategories = Category::count();
        $totalComments = Comment::count();

        $recentArticles = Article::with('user')
            ->latest()
            ->take(6)
            ->get();

        $recentComments = Comment::with('user')
            ->latest()
            ->take(6)
            ->get();

        $recentUsers = User::latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalArticles',
            'totalCategories',
            'totalComments',
            'recentArticles',
            'recentComments',
            'recentUsers'
        ));
    }
} 