<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $profile = \App\Models\User::first();

        $githubStats = cache()->remember('github_stats', 3600, function () {
            try {
                $response = \Illuminate\Support\Facades\Http::withHeaders([
                    'User-Agent' => 'Laravel Portfolio App'
                ])->timeout(3)->get('https://api.github.com/users/Linlinhtet980');

                if ($response->successful()) {
                    $data = $response->json();
                    return [
                        'repos' => $data['public_repos'] ?? 0,
                        'followers' => $data['followers'] ?? 0,
                        'following' => $data['following'] ?? 0,
                    ];
                }
            } catch (\Exception $e) {
                // Log exception if needed, fallback on catch
            }
            return [
                'repos' => 15,
                'followers' => 24,
                'following' => 8,
            ];
        });

        return view('welcome', compact('projects', 'githubStats', 'profile'));
    }

    public function projectDetail($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('project-detail', compact('project'));
    }
}
