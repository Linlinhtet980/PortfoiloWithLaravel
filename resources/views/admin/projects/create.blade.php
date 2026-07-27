@extends('admin.layout')

@section('title', 'Add New Project')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Project Profile</h3>
            <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="project-title">Project Title</label>
                        <input type="text" id="project-title" name="title" class="form-control" placeholder="e.g. E-Commerce System" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label>Technologies Used (Select from Skills)</label>
                        <div class="checkbox-grid">
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="1">
                                <span>HTML5</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="2">
                                <span>CSS3</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="3">
                                <span>JavaScript</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="4">
                                <span>PHP</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="5">
                                <span>MySQL</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="6">
                                <span>Git & GitHub</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="7">
                                <span>Figma</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project-github">GitHub Link</label>
                        <input type="url" id="project-github" name="github_link" class="form-control" placeholder="https://github.com/username/project">
                    </div>

                    <div class="form-group">
                        <label for="project-live">Live Demo Link</label>
                        <input type="url" id="project-live" name="live_link" class="form-control" placeholder="https://my-live-demo.com">
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-image">Screenshot Image</label>
                        <input type="file" id="project-image" name="image" class="form-control">
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-desc">Description</label>
                        <textarea id="project-desc" name="description" class="form-control" placeholder="Write a short summary about the project..." required></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="button" class="btn-admin btn-admin-primary">Save Project</button>
                </div>
            </form>
        </div>
    </div>
@endsection
