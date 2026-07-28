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
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="project-title">Project Title</label>
                        <input type="text" id="project-title" name="title" class="form-control" placeholder="e.g. E-Commerce System" required>
                    </div>

                    <div class="form-group">
                        <label for="project-slug">URL Slug</label>
                        <input type="text" id="project-slug" name="slug" class="form-control" placeholder="e.g. e-commerce-system" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-subtitle">Subtitle</label>
                        <input type="text" id="project-subtitle" name="subtitle" class="form-control" placeholder="e.g. Multi-vendor shopping platform">
                    </div>

                    <div class="form-group form-group-full">
                        <label>Technologies Used</label>
                        <div class="checkbox-grid">
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="html5">
                                <span>HTML5</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="css3">
                                <span>CSS3</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="js">
                                <span>JavaScript</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="php">
                                <span>PHP</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="mysql">
                                <span>MySQL</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="git">
                                <span>Git & GitHub</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="figma">
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

                    <div class="form-group">
                        <label for="project-image">Cover Image (Main Thumbnail)</label>
                        <input type="file" id="project-image" name="cover_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="project-gallery">Gallery Screenshots (Multiple Uploads)</label>
                        <input type="file" id="project-gallery" name="images[]" class="form-control" multiple>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-desc">Short Summary</label>
                        <textarea id="project-desc" name="description" class="form-control" placeholder="Write a short summary about the project..." required style="height: 80px;"></textarea>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-content">Detailed Content (Markdown Supported)</label>
                        <textarea id="project-content" name="content" class="form-control" placeholder="# Core Features..." required style="height: 180px;"></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="submit" class="btn-admin btn-admin-primary">Save Project</button>
                </div>
            </form>
        </div>
    </div>
@endsection
