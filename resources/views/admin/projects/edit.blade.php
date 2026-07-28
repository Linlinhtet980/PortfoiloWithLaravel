@extends('admin.layout')

@section('title', 'Edit Project')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Project Profile</h3>
            <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="project-title">Project Title</label>
                        <input type="text" id="project-title" name="title" class="form-control" value="{{ $project->title }}" placeholder="e.g. E-Commerce System" required>
                    </div>

                    <div class="form-group">
                        <label for="project-slug">URL Slug</label>
                        <input type="text" id="project-slug" name="slug" class="form-control" value="{{ $project->slug }}" placeholder="e.g. e-commerce-system" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-subtitle">Subtitle</label>
                        <input type="text" id="project-subtitle" name="subtitle" class="form-control" value="{{ $project->subtitle }}" placeholder="e.g. Multi-vendor shopping platform">
                    </div>

                    <div class="form-group form-group-full">
                        <label>Technologies Used</label>
                        <div class="checkbox-grid">
                            @php
                                $techs = $project->technologies ?? [];
                            @endphp
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="html5" {{ in_array('html5', $techs) ? 'checked' : '' }}>
                                <span>HTML5</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="css3" {{ in_array('css3', $techs) ? 'checked' : '' }}>
                                <span>CSS3</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="js" {{ in_array('js', $techs) || in_array('javascript', $techs) ? 'checked' : '' }}>
                                <span>JavaScript</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="php" {{ in_array('php', $techs) ? 'checked' : '' }}>
                                <span>PHP</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="mysql" {{ in_array('mysql', $techs) || in_array('database', $techs) ? 'checked' : '' }}>
                                <span>MySQL</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="git" {{ in_array('git', $techs) || in_array('github', $techs) ? 'checked' : '' }}>
                                <span>Git & GitHub</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="technologies[]" value="figma" {{ in_array('figma', $techs) ? 'checked' : '' }}>
                                <span>Figma</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project-github">GitHub Link</label>
                        <input type="url" id="project-github" name="github_link" class="form-control" value="{{ $project->github_link }}" placeholder="https://github.com/username/project">
                    </div>

                    <div class="form-group">
                        <label for="project-live">Live Demo Link</label>
                        <input type="url" id="project-live" name="live_link" class="form-control" value="{{ $project->live_link }}" placeholder="https://my-live-demo.com">
                    </div>

                    <div class="form-group">
                        <label for="project-image">Cover Image (Main Thumbnail)</label>
                        <input type="file" id="project-image" name="cover_image" class="form-control">
                        @if($project->cover_image)
                            <div style="margin-top: 10px;">
                                <span style="font-size: 0.82rem; color: var(--text-muted); display: block; margin-bottom: 4px;">Current Thumbnail:</span>
                                <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" alt="Preview" style="width: 120px; height: 75px; object-fit: cover; border-radius: var(--radius-sm); border: 1px solid var(--border-color);">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="project-gallery">Gallery Screenshots (Multiple Uploads)</label>
                        <input type="file" id="project-gallery" name="images[]" class="form-control" multiple>
                        @if($project->images && is_array($project->images))
                            <div style="margin-top: 10px; display: flex; gap: 8px; flex-wrap: wrap;">
                                @foreach($project->images as $img)
                                    <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" alt="Gallery Preview" style="width: 80px; height: 50px; object-fit: cover; border-radius: var(--radius-sm); border: 1px solid var(--border-color);">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-desc">Short Summary</label>
                        <textarea id="project-desc" name="description" class="form-control" placeholder="Write a short summary about the project..." required style="height: 80px;">{{ $project->description }}</textarea>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="project-content">Detailed Content (Markdown Supported)</label>
                        <textarea id="project-content" name="content" class="form-control" placeholder="# Core Features..." required style="height: 180px;">{{ $project->content }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="submit" class="btn-admin btn-admin-primary">Update Project</button>
                </div>
            </form>
        </div>
    </div>
@endsection
