@extends('admin.layout')

@section('title', 'Add New Article')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Write New Blog Article</h3>
            <a href="{{ route('admin.blog') }}" class="btn-admin btn-admin-outline">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
        </div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="admin-form-grid">
                    <div class="form-group form-group-full">
                        <label for="blog-title">Article Title</label>
                        <input type="text" id="blog-title" name="title" class="form-control" placeholder="e.g. Master CSS Variables in 10 Minutes" required>
                    </div>

                    <div class="form-group">
                        <label for="blog-category">Category</label>
                        <select id="blog-category" name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="Frontend">Frontend Development</option>
                            <option value="Backend">Backend Development</option>
                            <option value="Design">UI/UX Design</option>
                            <option value="Career">Career & Productivity</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="blog-status">Publish Status</label>
                        <select id="blog-status" name="status" class="form-control" required>
                            <option value="Draft">Draft</option>
                            <option value="Published">Published</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="blog-image">Cover Image (Landscape)</label>
                        <input type="file" id="blog-image" name="cover_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="blog-tags">Tags (Comma separated)</label>
                        <input type="text" id="blog-tags" name="tags" class="form-control" placeholder="e.g. CSS, Design System, Bento">
                    </div>

                    <div class="form-group form-group-full">
                        <label for="blog-content">Article Content</label>
                        <textarea id="blog-content" name="content" class="form-control" rows="12" placeholder="Start writing your thoughts here..." required></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.blog') }}" class="btn-admin btn-admin-outline">Cancel</a>
                    <button type="button" class="btn-admin btn-admin-primary">Publish Article</button>
                </div>
            </form>
        </div>
    </div>
@endsection
