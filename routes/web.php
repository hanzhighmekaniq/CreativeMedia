<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriticismController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageSlideController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserMentorController;
use App\Http\Controllers\UserVisitorController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SummernoteController;
use App\Http\Controllers\StudentWorkController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', \App\Http\Middleware\CheckRole::class.':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('mentors', UserMentorController::class);
    Route::resource('student-works', StudentWorkController::class);
    Route::resource('visitors', UserVisitorController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('testimonials', TestimonialsController::class);
    Route::resource('criticisms', CriticismController::class);
    Route::resource('landingsliders', LandingPageSlideController::class);
    Route::get('/articles/subcategories', [ArticleController::class, 'subcategories'])->name('articles.subcategories');
    Route::post('/summernote/upload', [SummernoteController::class, 'upload'])->name('summernote.upload');
});

// Mentor Routes
Route::middleware(['auth', \App\Http\Middleware\CheckRole::class.':mentor'])->prefix('mentor')->name('mentor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('mentor.dashboard');
    })->name('dashboard');
});

// Visitor Routes
Route::middleware(['auth', \App\Http\Middleware\CheckRole::class.':visitor'])->prefix('visitor')->name('visitor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('visitor.dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
