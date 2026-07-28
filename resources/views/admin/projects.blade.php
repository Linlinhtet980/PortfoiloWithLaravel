@extends('admin.layout')

@section('title', 'Manage Projects')

@section('content')
    <!-- Left: Projects List Table (Full Width) -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Project List</h3>
            <a href="{{ route('admin.projects.create') }}" class="btn-admin btn-admin-primary">
                <i class="fas fa-plus"></i> Add New Project
            </a>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Project Name</th>
                            <th>Technologies</th>
                            <th>Links</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>
                                    @if($project->cover_image)
                                        <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="project-thumb">
                                    @else
                                        <div class="project-thumb" style="background: rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                                            <i class="fas fa-image" style="color: var(--text-muted);"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $project->title }}</strong>
                                    <br>
                                    <span class="stat-label">{{ Str::limit($project->description, 60) }}</span>
                                </td>
                                <td>
                                    <div class="tech-badges-list">
                                        @if($project->technologies)
                                            @foreach($project->technologies as $tech)
                                                <span class="tech-tag">{{ strtoupper($tech) }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="project-links-cell">
                                        @if($project->github_link)
                                            <a href="{{ $project->github_link }}" target="_blank" title="GitHub Link"><i class="fab fa-github"></i></a>
                                        @endif
                                        @if($project->live_link)
                                            <a href="{{ $project->live_link }}" target="_blank" title="Live Link"><i class="fas fa-external-link-alt"></i></a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-action btn-edit" title="Edit" style="display: inline-flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 30px; color: var(--text-muted);">
                                    No projects created yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
