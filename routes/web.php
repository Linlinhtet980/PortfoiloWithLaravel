<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/{slug}', [HomeController::class, 'projectDetail'])->name('projects.detail');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'sendMessage'])->name('contact.submit');

// Admin Panel Routes
use App\Http\Controllers\Auth\LoginController;

Route::prefix('admin')->group(function () {
    // Guest auth routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Protected admin routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
        Route::get('/projects/create', [AdminController::class, 'createProject'])->name('admin.projects.create');
        Route::post('/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
        Route::get('/projects/{id}/edit', [AdminController::class, 'editProject'])->name('admin.projects.edit');
        Route::put('/projects/{id}', [AdminController::class, 'updateProject'])->name('admin.projects.update');
        Route::delete('/projects/{id}', [AdminController::class, 'destroyProject'])->name('admin.projects.delete');
        Route::get('/skills', [AdminController::class, 'skills'])->name('admin.skills');
        Route::get('/skills/create', [AdminController::class, 'createSkill'])->name('admin.skills.create');
        Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
        Route::delete('/messages/{id}', [AdminController::class, 'destroyMessage'])->name('admin.messages.delete');
        
        // Additional Admin Modules (Profile, Blog, Resume/Services)
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::put('/profile/security', [AdminController::class, 'updateSecurity'])->name('admin.security.update');
        Route::get('/blog', [AdminController::class, 'blog'])->name('admin.blog');
        Route::get('/blog/create', [AdminController::class, 'createBlog'])->name('admin.blog.create');
        Route::get('/resume', [AdminController::class, 'resume'])->name('admin.resume');
        Route::get('/experience/create', [AdminController::class, 'createExperience'])->name('admin.experience.create');
        Route::get('/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
    });
});
