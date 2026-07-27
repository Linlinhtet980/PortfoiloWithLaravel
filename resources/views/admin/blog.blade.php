@extends('admin.layout')

@section('title', 'Manage Blog Articles')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Blog Articles</h3>
            <a href="{{ route('admin.blog.create') }}" class="btn-admin btn-admin-primary">
                <i class="fas fa-plus"></i> Add New Article
            </a>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Views</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=100&h=60" alt="Laravel 11" class="project-thumb">
                            </td>
                            <td>
                                <strong>Getting Started with Laravel 11 Features</strong>
                                <br>
                                <span class="stat-label">An in-depth look into routing, controller, and directory structure changes...</span>
                            </td>
                            <td><span class="tech-tag">Backend</span></td>
                            <td><strong>324 views</strong></td>
                            <td>Jul 20, 2026</td>
                            <td><span class="status-badge status-read">Published</span></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&q=80&w=100&h=60" alt="UX Design" class="project-thumb">
                            </td>
                            <td>
                                <strong>Why Bento Layouts are Dominating Web UI Design in 2026</strong>
                                <br>
                                <span class="stat-label">Exploring the rise of modular bento grid structures and layout aesthetics...</span>
                            </td>
                            <td><span class="tech-tag">UI/UX Design</span></td>
                            <td><strong>156 views</strong></td>
                            <td>Jul 15, 2026</td>
                            <td><span class="status-badge status-read">Published</span></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=100&h=60" alt="Vanilla CSS" class="project-thumb">
                            </td>
                            <td>
                                <strong>Writing High-Performance CSS without Frameworks</strong>
                                <br>
                                <span class="stat-label">Tips on leveraging custom CSS variables, flexbox, and CSS grid directly...</span>
                            </td>
                            <td><span class="tech-tag">Frontend</span></td>
                            <td><strong>82 views</strong></td>
                            <td>Jul 10, 2026</td>
                            <td><span class="status-badge status-unread">Draft</span></td>
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
