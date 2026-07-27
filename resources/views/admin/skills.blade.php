@extends('admin.layout')

@section('title', 'Manage Skills')

@section('content')
    <!-- Left: Skills List Table (Full Width) -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Skills Inventory</h3>
            <a href="{{ route('admin.skills.create') }}" class="btn-admin btn-admin-primary">
                <i class="fas fa-plus"></i> Add New Skill
            </a>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Skill Name</th>
                            <th>Category</th>
                            <th>Proficiency</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="skill-icon-cell color-html">
                                    <i class="fab fa-html5"></i>
                                </div>
                            </td>
                            <td><strong>HTML5</strong></td>
                            <td><span class="tech-tag">Frontend</span></td>
                            <td><strong>85%</strong></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skill-icon-cell color-css">
                                    <i class="fab fa-css3-alt"></i>
                                </div>
                            </td>
                            <td><strong>CSS3</strong></td>
                            <td><span class="tech-tag">Frontend</span></td>
                            <td><strong>80%</strong></td>
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
                                    <i class="fab fa-php"></i>
                                </div>
                            </td>
                            <td><strong>PHP</strong></td>
                            <td><span class="tech-tag">Backend</span></td>
                            <td><strong>70%</strong></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skill-icon-cell color-mysql">
                                    <i class="fas fa-database"></i>
                                </div>
                            </td>
                            <td><strong>MySQL</strong></td>
                            <td><span class="tech-tag">Backend</span></td>
                            <td><strong>65%</strong></td>
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
