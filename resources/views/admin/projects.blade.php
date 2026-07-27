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
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=100&h=60" alt="School System" class="project-thumb">
                            </td>
                            <td>
                                <strong>School Management System</strong>
                                <br>
                                <span class="stat-label">Student & Teacher management system...</span>
                            </td>
                            <td>
                                <div class="tech-badges-list">
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">HTML5</span>
                                    <span class="tech-tag">JavaScript</span>
                                </div>
                            </td>
                            <td>
                                <div class="project-links-cell">
                                    <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                                    <a href="#" title="Live Link"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=100&h=60" alt="Movie App" class="project-thumb">
                            </td>
                            <td>
                                <strong>Movie App</strong>
                                <br>
                                <span class="stat-label">Browse latest high rated movies...</span>
                            </td>
                            <td>
                                <div class="tech-badges-list">
                                    <span class="tech-tag">HTML5</span>
                                    <span class="tech-tag">CSS3</span>
                                    <span class="tech-tag">JavaScript</span>
                                </div>
                            </td>
                            <td>
                                <div class="project-links-cell">
                                    <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                                </div>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=100&h=60" alt="Portfolio" class="project-thumb">
                            </td>
                            <td>
                                <strong>Personal Portfolio</strong>
                                <br>
                                <span class="stat-label">Responsive design website presentation...</span>
                            </td>
                            <td>
                                <div class="tech-badges-list">
                                    <span class="tech-tag">HTML5</span>
                                    <span class="tech-tag">CSS3</span>
                                    <span class="tech-tag">JavaScript</span>
                                </div>
                            </td>
                            <td>
                                <div class="project-links-cell">
                                    <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                                    <a href="#" title="Live Link"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
