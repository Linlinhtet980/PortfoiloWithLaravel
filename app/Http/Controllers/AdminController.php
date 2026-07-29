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
        $projects = \App\Models\Project::latest()->get();
        return view('admin.projects', compact('projects'));
    }

    public function createProject()
    {
        return view('admin.projects.create');
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'technologies' => 'required|array',
            'cover_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['cover_image', 'images']);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('projects', 'public');
            $data['cover_image'] = $path;
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('projects', 'public');
            }
            $data['images'] = $images;
        }

        \App\Models\Project::create($data);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
    }

    public function editProject($id)
    {
        $project = \App\Models\Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = \App\Models\Project::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $id,
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'technologies' => 'required|array',
            'cover_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['cover_image', 'images']);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image && !\Illuminate\Support\Str::startsWith($project->cover_image, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->cover_image);
            }
            $path = $request->file('cover_image')->store('projects', 'public');
            $data['cover_image'] = $path;
        }

        if ($request->hasFile('images')) {
            if ($project->images) {
                foreach ($project->images as $oldImg) {
                    if (!\Illuminate\Support\Str::startsWith($oldImg, 'http')) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImg);
                    }
                }
            }
            $images = [];
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('projects', 'public');
            }
            $data['images'] = $images;
        }

        $project->update($data);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }

    public function destroyProject($id)
    {
        $project = \App\Models\Project::findOrFail($id);

        if ($project->cover_image && !\Illuminate\Support\Str::startsWith($project->cover_image, 'http')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->cover_image);
        }

        if ($project->images) {
            foreach ($project->images as $img) {
                if (!\Illuminate\Support\Str::startsWith($img, 'http')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($img);
                }
            }
        }

        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully!');
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
        $messages = \App\Models\Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function destroyMessage($id)
    {
        $message = \App\Models\Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message deleted successfully!');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
            'cv' => 'nullable|mimes:pdf|max:5120',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'telegram' => 'nullable|url',
            'phone' => 'nullable|string|max:50',
            'bio' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->job_title = $request->title;
        $user->github_link = $request->github;
        $user->linkedin_link = $request->linkedin;
        $user->telegram_link = $request->telegram;
        $user->phone = $request->phone;
        $user->bio = $request->bio;

        if ($request->hasFile('avatar')) {
            if ($user->avatar && !\Illuminate\Support\Str::startsWith($user->avatar, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('profile', 'public');
            $user->avatar = $path;
        }

        if ($request->hasFile('cv')) {
            if ($user->cv_path && !\Illuminate\Support\Str::startsWith($user->cv_path, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->cv_path);
            }
            $path = $request->file('cv')->store('profile', 'public');
            $user->cv_path = $path;
        }

        $user->save();

        return redirect()->route('admin.profile')->with('profile_success', 'Profile settings updated successfully!');
    }

    public function updateSecurity(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('security_success', 'Login credentials updated successfully!');
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
