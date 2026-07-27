@extends('admin.layout')

@section('title', 'Add New Skill')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Skill Profile</h3>
            <a href="{{ route('admin.skills') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Skills
            </a>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="skill-name">Skill Name</label>
                        <input type="text" id="skill-name" name="name" class="form-control" placeholder="e.g. Laravel" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label>Category (Click to Select)</label>
                        <input type="hidden" id="skill-category" name="category" value="" required>
                        <div class="category-select-grid">
                            <button type="button" class="category-select-item color-frontend" data-value="Frontend">
                                <i class="fas fa-laptop-code"></i>
                                <span>Frontend Development</span>
                            </button>
                            <button type="button" class="category-select-item color-backend" data-value="Backend">
                                <i class="fas fa-server"></i>
                                <span>Backend Development</span>
                            </button>
                            <button type="button" class="category-select-item color-design" data-value="Design">
                                <i class="fas fa-palette"></i>
                                <span>UI/UX Design</span>
                            </button>
                            <button type="button" class="category-select-item color-tools" data-value="Tools">
                                <i class="fas fa-tools"></i>
                                <span>Other Tools & Tech</span>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="skill-percentage">Proficiency Percentage</label>
                        <input type="number" id="skill-percentage" name="percentage" class="form-control" placeholder="e.g. 85" min="1" max="100" required>
                    </div>

                    <div class="form-group">
                        <label for="skill-icon">FontAwesome Icon Class</label>
                        <input type="text" id="skill-icon" name="icon" class="form-control" placeholder="e.g. fab fa-laravel">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.skills') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="button" class="btn-admin btn-admin-primary">Save Skill</button>
                </div>
            </form>
        </div>
    </div>
@endsection
