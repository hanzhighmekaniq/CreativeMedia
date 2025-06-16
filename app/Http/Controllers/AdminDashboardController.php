<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\StudentWork;
use App\Models\Testimonial;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalMentors = User::where('role', 'mentor')->count();
        $totalVisitors = User::where('role', 'visitor')->count();
        $totalArticles = Article::count();
        $totalStudentWorks = StudentWork::count();
        $totalTestimonials = Testimonial::count();
        $totalComments = Comment::count();

        // Get recent criticisms (comments)
        $recentCriticisms = Comment::with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.admin-dashboard', compact(
            'totalMentors',
            'totalVisitors',
            'totalArticles',
            'totalStudentWorks',
            'totalTestimonials',
            'totalComments',
            'recentCriticisms'
        ));
    }
}
