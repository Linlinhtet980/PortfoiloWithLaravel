<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioQATest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_guests_are_redirected_from_admin_dashboard()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_contact_form_saves_messages_to_database()
    {
        $messageData = [
            'name' => 'QA Tester',
            'email' => 'qa@test.com',
            'message' => 'This is a automated QA verification test message.'
        ];

        $response = $this->post('/contact', $messageData);

        // Assert redirect or success response
        $response->assertStatus(200);

        // Assert database persistence
        $this->assertDatabaseHas('messages', [
            'name' => 'QA Tester',
            'email' => 'qa@test.com'
        ]);
    }

    public function test_admin_can_login_with_correct_credentials()
    {
        // Seed admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
        ]);

        $loginData = [
            'email' => 'admin@gmail.com',
            'password' => 'Password123'
        ];

        $response = $this->post('/admin/login', $loginData);
        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin);
    }

    public function test_project_crud_lifecycle_pipeline()
    {
        // 1. Authenticate Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
        ]);
        $this->actingAs($admin);

        // 2. CREATE - Save project to database
        $projectData = [
            'title' => 'Test Project Pipeline',
            'slug' => 'test-project-pipeline',
            'description' => 'Verify CRUD databases entry.',
            'content' => 'Full project pipeline content validation.',
            'technologies' => ['Laravel', 'PHP', 'MySQL'],
        ];

        $response = $this->post('/admin/projects', $projectData);
        $response->assertRedirect('/admin/projects');

        $this->assertDatabaseHas('projects', [
            'title' => 'Test Project Pipeline',
            'slug' => 'test-project-pipeline'
        ]);

        // Find the created project
        $project = \App\Models\Project::firstWhere('slug', 'test-project-pipeline');

        // 3. READ - Verify homepage pulls project from database
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Test Project Pipeline');

        // 4. UPDATE - Edit project details
        $updatedData = [
            'title' => 'Updated Project Title',
            'slug' => 'test-project-pipeline',
            'description' => 'Verify CRUD databases update.',
            'content' => 'Full project pipeline content validation.',
            'technologies' => ['Laravel', 'PHP', 'MySQL'],
        ];

        $response = $this->put("/admin/projects/{$project->id}", $updatedData);
        $response->assertRedirect('/admin/projects');

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Updated Project Title'
        ]);

        // 5. DELETE - Remove project from database
        $response = $this->delete("/admin/projects/{$project->id}");
        $response->assertRedirect('/admin/projects');

        $this->assertDatabaseMissing('projects', [
            'id' => $project->id
        ]);
    }

    public function test_admin_can_update_profile_settings()
    {
        $admin = User::create([
            'name' => 'Original Name',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
        ]);
        $this->actingAs($admin);

        $profileData = [
            'name' => 'Updated Name',
            'title' => 'Senior Developer',
            'github' => 'https://github.com/Linlinhtet980',
            'linkedin' => 'https://linkedin.com/in/linthureinhtet',
            'telegram' => 'https://t.me/linthureinhtet',
            'phone' => '+95 9 999 999 999',
            'bio' => 'New dynamic bio content goes here.',
        ];

        $response = $this->put('/admin/profile', $profileData);
        $response->assertRedirect('/admin/profile');

        $this->assertDatabaseHas('users', [
            'id' => $admin->id,
            'name' => 'Updated Name',
            'job_title' => 'Senior Developer',
            'phone' => '+95 9 999 999 999',
            'bio' => 'New dynamic bio content goes here.'
        ]);
    }

    public function test_admin_can_crud_skills()
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
        ]);
        $this->actingAs($admin);

        // 1. CREATE
        $skillData = [
            'name' => 'Laravel Framework',
            'category' => 'backend',
            'proficiency' => 90,
            'icon_class' => 'fab fa-laravel',
            'color' => '#ff2d20'
        ];

        $response = $this->post('/admin/skills', $skillData);
        $response->assertRedirect('/admin/skills');

        $this->assertDatabaseHas('skills', [
            'name' => 'Laravel Framework',
            'proficiency' => 90
        ]);

        $skill = \App\Models\Skill::firstWhere('name', 'Laravel Framework');

        // 2. UPDATE
        $updatedData = [
            'name' => 'Laravel V11',
            'category' => 'backend',
            'proficiency' => 95,
            'icon_class' => 'fab fa-laravel',
            'color' => '#ff2d20'
        ];

        $response = $this->put("/admin/skills/{$skill->id}", $updatedData);
        $response->assertRedirect('/admin/skills');

        $this->assertDatabaseHas('skills', [
            'id' => $skill->id,
            'name' => 'Laravel V11',
            'proficiency' => 95
        ]);

        // 3. DELETE
        $response = $this->delete("/admin/skills/{$skill->id}");
        $response->assertRedirect('/admin/skills');

        $this->assertDatabaseMissing('skills', [
            'id' => $skill->id
        ]);
    }

    public function test_homepage_records_visit()
    {
        $this->assertDatabaseEmpty('visits');

        // Access landing page
        $response = $this->get('/');
        $response->assertStatus(200);

        // Assert a visit was logged
        $this->assertDatabaseCount('visits', 1);

        // Access landing page again (same session)
        $response = $this->get('/');
        $response->assertStatus(200);

        // Assert count remains 1 (preventing duplicate logs in same session)
        $this->assertDatabaseCount('visits', 1);
    }
}
