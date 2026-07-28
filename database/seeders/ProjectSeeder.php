<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'School Management System',
            'slug' => 'school-management-system',
            'subtitle' => 'Student & Teacher Database System',
            'description' => 'Comprehensive database system to manage students, teachers, classes, and marks.',
            'content' => "# School Management System\n\nA secure, feature-rich web application built to streamline educational operations, manage student enrollment, organize academic classes, and record test/exam grading records.\n\n### Core Features\n- **Student & Teacher Registry:** Easily register, search, and update profiles of pupils and educators.\n- **Academic Class Scheduling:** Assign teachers to subjects and schedule weekly class calendars.\n- **Marks & Grading Console:** Record subject marks, calculate grade averages, and generate print-friendly report cards.\n- **Security & Roles:** Strict authorization checks for Admins, Teachers, and Students.",
            'cover_image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=600&h=300',
            'github_link' => '#',
            'live_link' => '#',
            'technologies' => ['php', 'database', 'js']
        ]);

        Project::create([
            'title' => 'Movie Cataloging App',
            'slug' => 'movie-cataloging-app',
            'subtitle' => 'Movie Database & Catalog Browser',
            'description' => 'Responsive movie library browsing with API data fetching and custom search filters.',
            'content' => "# Movie Cataloging App\n\nA modern, highly responsive frontend application designed to search, browse, filter, and catalog movies in a sleek responsive layout. Fetches real-time movie details and reviews from public database APIs.\n\n### Core Features\n- **API Search & Filter:** Fetch film summaries, cast, runtimes, and scores instantly from public API services.\n- **Custom Lists:** Create, edit, and export personalized lists of watched or watch-list movies.\n- **Advanced Layout:** Grid-based layouts adapting beautifully to any desktop, tablet, or mobile screens.\n- **Interactive Reviews:** User reviews and star ratings using local storage preservation.",
            'cover_image' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=600&h=300',
            'github_link' => '#',
            'live_link' => null,
            'technologies' => ['html5', 'css3', 'js']
        ]);
    }
}
