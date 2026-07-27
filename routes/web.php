<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Panel Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
    Route::get('/projects/create', [AdminController::class, 'createProject'])->name('admin.projects.create');
    Route::get('/skills', [AdminController::class, 'skills'])->name('admin.skills');
    Route::get('/skills/create', [AdminController::class, 'createSkill'])->name('admin.skills.create');
    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    
    // Additional Admin Modules (Profile, Blog, Resume/Services)
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/blog', [AdminController::class, 'blog'])->name('admin.blog');
    Route::get('/blog/create', [AdminController::class, 'createBlog'])->name('admin.blog.create');
    Route::get('/resume', [AdminController::class, 'resume'])->name('admin.resume');
    Route::get('/experience/create', [AdminController::class, 'createExperience'])->name('admin.experience.create');
    Route::get('/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
});
