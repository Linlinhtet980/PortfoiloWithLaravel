@extends('admin.layout')

@section('title', 'Manage Resume & Services')

@section('content')
    <!-- Tab navigation -->
    <div class="admin-tabs">
        <button class="tab-btn active" data-target="experience-panel">
            <i class="fas fa-briefcase"></i> Work Experience
        </button>
        <button class="tab-btn" data-target="services-panel">
            <i class="fas fa-concierge-bell"></i> Services Offered
        </button>
    </div>

    <!-- Panel 1: Work Experience -->
    <div class="tab-panel active" id="experience-panel">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Professional Experience Timeline</h3>
                <a href="{{ route('admin.experience.create') }}" class="btn-admin btn-admin-primary">
                    <i class="fas fa-plus"></i> Add Work Experience
                </a>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Company / Employer</th>
                                <th>Duration</th>
                                <th>Description Summary</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Senior Web Developer</strong></td>
                                <td>Freelance / Self-employed</td>
                                <td>2024 - Present</td>
                                <td><span class="stat-label">Developed custom APIs, SaaS dashboards, and managed AWS server deployments...</span></td>
                                <td>
                                    <div class="actions-cell">
                                        <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Junior Software Engineer</strong></td>
                                <td>Ace Tech Solution Co., Ltd.</td>
                                <td>2022 - 2024</td>
                                <td><span class="stat-label">Maintained PHP Laravel codebases, optimized SQL queries, and integrated payment gateways...</span></td>
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
    </div>

    <!-- Panel 2: Services Offered -->
    <div class="tab-panel" id="services-panel">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Services Offered</h3>
                <a href="{{ route('admin.services.create') }}" class="btn-admin btn-admin-primary">
                    <i class="fas fa-plus"></i> Add Service
                </a>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Service Name</th>
                                <th>Description Summary</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="skill-icon-cell color-html">
                                        <i class="fas fa-laptop-code"></i>
                                    </div>
                                </td>
                                <td><strong>Web Application Development</strong></td>
                                <td><span class="stat-label">Building performant, responsive web apps using modern frameworks and PHP Laravel...</span></td>
                                <td>
                                    <div class="actions-cell">
                                        <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="skill-icon-cell color-php">
                                        <i class="fas fa-server"></i>
                                    </div>
                                </td>
                                <td><strong>API Development & Integration</strong></td>
                                <td><span class="stat-label">Designing RESTful APIs, securing endpoints, and integrating third-party services...</span></td>
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
    </div>
@endsection
