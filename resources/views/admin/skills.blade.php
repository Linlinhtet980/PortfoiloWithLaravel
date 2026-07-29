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
                        @forelse($skills as $skill)
                            <tr>
                                <td>
                                    <div class="skill-icon-cell" style="background: rgba(255,255,255,0.05); width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 6px;">
                                        <i class="{{ $skill->icon_class }}" style="color: {{ $skill->color ?? 'var(--accent-primary)' }}; font-size: 1.2rem;"></i>
                                    </div>
                                </td>
                                <td><strong>{{ $skill->name }}</strong></td>
                                <td><span class="tech-tag">{{ ucfirst($skill->category) }}</span></td>
                                <td><strong>{{ $skill->proficiency }}%</strong></td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn-action btn-edit" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.skills.delete', $skill->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" title="Delete" style="background:none; border:none; cursor:pointer; color: var(--danger-color);"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 30px;">No skills registered yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
