<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::query()->latest()->get();
        $skills = \App\Models\Skill::query()->get();
        $profile = \App\Models\User::query()->first();

        // Record a profile view if not visited in this session
        if (!session()->has('portfolio_visited')) {
            try {
                \App\Models\Visit::create([
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
                session()->put('portfolio_visited', true);
            } catch (\Exception $e) {
                // Fail silently if DB has issue
            }
        }

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

        return view('welcome', compact('projects', 'githubStats', 'profile', 'skills'));
    }

    public function projectDetail(string $slug)
    {
        $project = Project::query()->where('slug', '=', $slug, 'and')->firstOrFail();
        
        try {
            $project->increment('views');
        } catch (\Exception $e) {
            // Fail silently
        }

        return view('project-detail', compact('project'));
    }
}
