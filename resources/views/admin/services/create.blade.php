@extends('admin.layout')

@section('title', 'Add Service')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Service Record</h3>
            <a href="{{ route('admin.resume') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Resume
            </a>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="admin-form-grid">
                    <div class="form-group">
                        <label for="srv-name">Service Name</label>
                        <input type="text" id="srv-name" name="name" class="form-control" placeholder="e.g. Web Development" required>
                    </div>

                    <div class="form-group">
                        <label for="srv-icon">FontAwesome Icon Class</label>
                        <input type="text" id="srv-icon" name="icon" class="form-control" placeholder="e.g. fas fa-laptop-code" required>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="srv-desc">Service Description</label>
                        <textarea id="srv-desc" name="description" class="form-control" rows="5" placeholder="Write a short summary describing the service you provide..." required></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.resume') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="button" class="btn-admin btn-admin-primary">Save Service</button>
                </div>
            </form>
        </div>
    </div>
@endsection
