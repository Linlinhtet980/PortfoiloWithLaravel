@extends('admin.layout')

@section('title', 'Add Work Experience')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Work Experience Record</h3>
            <a href="{{ route('admin.resume') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Resume
            </a>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="exp-company">Company / Employer Name</label>
                        <input type="text" id="exp-company" name="company" class="form-control" placeholder="e.g. Ace Software Solutions" required>
                    </div>

                    <div class="form-group">
                        <label for="exp-role">Role / Designation</label>
                        <input type="text" id="exp-role" name="role" class="form-control" placeholder="e.g. Lead Web Developer" required>
                    </div>

                    <div class="form-group">
                        <label for="exp-duration">Duration Period</label>
                        <input type="text" id="exp-duration" name="duration" class="form-control" placeholder="e.g. 2024 - Present or 2022 - 2024" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="exp-desc">Job Description / Responsibilities</label>
                        <textarea id="exp-desc" name="description" class="form-control" rows="6" placeholder="Describe your key achievements and technologies used..." required></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.resume') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="button" class="btn-admin btn-admin-primary">Save Experience</button>
                </div>
            </form>
        </div>
    </div>
@endsection
