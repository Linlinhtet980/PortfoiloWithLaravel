@extends('admin.layout')

@section('title', 'Edit Skill')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modify Skill Profile</h3>
            <a href="{{ route('admin.skills') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Skills
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="skill-name">Skill Name</label>
                        <input type="text" id="skill-name" name="name" class="form-control" placeholder="e.g. Laravel" value="{{ $skill->name }}" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label>Category (Click to Select)</label>
                        <input type="hidden" id="skill-category" name="category" value="{{ $skill->category }}" required>
                        <div class="category-select-grid">
                            <button type="button" class="category-select-item color-frontend {{ $skill->category === 'frontend' ? 'active' : '' }}" data-value="frontend">
                                <i class="fas fa-laptop-code"></i>
                                <span>Frontend Development</span>
                            </button>
                            <button type="button" class="category-select-item color-backend {{ $skill->category === 'backend' ? 'active' : '' }}" data-value="backend">
                                <i class="fas fa-server"></i>
                                <span>Backend Development</span>
                            </button>
                            <button type="button" class="category-select-item color-design {{ $skill->category === 'design' ? 'active' : '' }}" data-value="design">
                                <i class="fas fa-palette"></i>
                                <span>UI/UX Design</span>
                            </button>
                            <button type="button" class="category-select-item color-tools {{ $skill->category === 'tools' ? 'active' : '' }}" data-value="tools">
                                <i class="fas fa-tools"></i>
                                <span>Other Tools & Tech</span>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="skill-percentage">Proficiency Percentage</label>
                        <input type="number" id="skill-percentage" name="proficiency" class="form-control" placeholder="e.g. 85" min="1" max="100" value="{{ $skill->proficiency }}" required>
                    </div>

                    <div class="form-group">
                        <label for="skill-icon">FontAwesome Icon Class</label>
                        <input type="text" id="skill-icon" name="icon_class" class="form-control" placeholder="e.g. fab fa-laravel" value="{{ $skill->icon_class }}" required>
                    </div>

                    <div class="form-group">
                        <label for="skill-color">Color Hex / Value (Optional)</label>
                        <input type="text" id="skill-color" name="color" class="form-control" placeholder="e.g. #ff7675 or var(--accent-primary)" value="{{ $skill->color }}">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.skills') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="submit" class="btn-admin btn-admin-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
