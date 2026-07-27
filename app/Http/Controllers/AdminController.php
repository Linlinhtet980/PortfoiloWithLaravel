<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function projects()
    {
        return view('admin.projects');
    }

    public function createProject()
    {
        return view('admin.projects.create');
    }

    public function skills()
    {
        return view('admin.skills');
    }

    public function createSkill()
    {
        return view('admin.skills.create');
    }

    public function messages()
    {
        return view('admin.messages');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function blog()
    {
        return view('admin.blog');
    }

    public function createBlog()
    {
        return view('admin.blog.create');
    }

    public function resume()
    {
        return view('admin.resume');
    }

    public function createExperience()
    {
        return view('admin.experience.create');
    }

    public function createService()
    {
        return view('admin.services.create');
    }
}
