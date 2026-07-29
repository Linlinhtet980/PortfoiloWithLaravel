@extends('admin.layout')

@section('title', 'Profile')

@section('content')
    <div id="profile-page-wrapper">
        
        <!-- View Mode: Profile Card Display -->
        <div id="profile-view-mode" class="profile-view-grid">
            <!-- Left Panel: Avatar, Contact & Social Links -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Profile</h3>
                    <button type="button" class="btn-admin btn-admin-primary" id="edit-profile-btn">
                        <i class="fas fa-edit"></i> Edit Profile
                    </button>
                </div>
                <div class="card-body profile-card-body">
                    <div class="profile-header-section">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=150&h=150' }}" alt="{{ Auth::user()->name }}" class="profile-view-avatar">
                        <h2 class="profile-view-name">{{ Auth::user()->name }}</h2>
                        <p class="profile-view-title">{{ Auth::user()->job_title ?? 'Full-Stack Developer' }}</p>
                    </div>
                    
                    <div class="profile-details-list">
                        <div class="profile-detail-item">
                            <i class="fas fa-envelope"></i>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        <div class="profile-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ Auth::user()->phone ?? 'Add your phone number' }}</span>
                        </div>
                        <div class="profile-detail-item">
                            <i class="fas fa-file-pdf"></i>
                            @if (Auth::user()->cv_path)
                                <a href="{{ asset('storage/' . Auth::user()->cv_path) }}" class="cv-download-link" target="_blank">Download CV / Resume</a>
                            @else
                                <span style="color: var(--text-muted); font-size: 0.85rem;">No CV uploaded</span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-social-grid">
                        <a href="{{ Auth::user()->github_link ?? '#' }}" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                        <a href="{{ Auth::user()->linkedin_link ?? '#' }}" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="{{ Auth::user()->telegram_link ?? '#' }}" target="_blank" title="Telegram"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Bio & Detailed Description -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About Me / Bio Details</h3>
                </div>
                <div class="card-body">
                    <p class="profile-view-bio">
                        {{ Auth::user()->bio ?? 'Write some bio details here.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Edit Mode: Profile Form Card (Hidden by default) -->
        <div id="profile-edit-mode" class="profile-mode-hidden">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile Details</h3>
                </div>
                <div class="card-body">
                    @if (session('profile_success'))
                        <div style="background: rgba(46, 204, 113, 0.15); border: 1px solid #2ecc71; border-radius: 4px; padding: 12px; margin-bottom: 20px; font-size: 0.85rem; color: #2ecc71;">
                            {{ session('profile_success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="admin-form-grid">
                            <!-- Basic details -->
                            <div class="form-group">
                                <label for="profile-name">Full Name</label>
                                <input type="text" id="profile-name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="profile-title">Job Title / Designation</label>
                                <input type="text" id="profile-title" name="title" class="form-control" value="{{ Auth::user()->job_title ?? 'Full-Stack Developer' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="profile-avatar">Avatar Image</label>
                                <input type="file" id="profile-avatar" name="avatar" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="profile-cv">CV / Resume (PDF)</label>
                                <input type="file" id="profile-cv" name="cv" class="form-control">
                            </div>

                            <!-- Social links -->
                            <div class="form-group">
                                <label for="social-github">GitHub Link</label>
                                <input type="url" id="social-github" name="github" class="form-control" value="{{ Auth::user()->github_link }}">
                            </div>

                            <div class="form-group">
                                <label for="social-linkedin">LinkedIn Link</label>
                                <input type="url" id="social-linkedin" name="linkedin" class="form-control" value="{{ Auth::user()->linkedin_link }}">
                            </div>

                            <div class="form-group">
                                <label for="social-telegram">Telegram Link</label>
                                <input type="url" id="social-telegram" name="telegram" class="form-control" value="{{ Auth::user()->telegram_link }}">
                            </div>

                            <div class="form-group">
                                <label for="social-phone">Contact Phone Number</label>
                                <input type="text" id="social-phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>

                            <!-- Full width bio -->
                            <div class="form-group form-group-full">
                                <label for="profile-bio">Bio / About Me Description</label>
                                <textarea id="profile-bio" name="bio" class="form-control" rows="5" placeholder="Tell visitors about your background, career, and coding philosophy..." required>{{ Auth::user()->bio }}</textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-admin btn-admin-outline" id="cancel-edit-btn">Cancel</button>
                            <button type="submit" class="btn-admin btn-admin-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Account Security Settings (Email & Password Update) -->
        <div class="card" style="margin-top: 25px;">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-lock"></i> Account Security Settings</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.security.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @if (session('security_success'))
                        <div style="background: rgba(46, 204, 113, 0.15); border: 1px solid #2ecc71; border-radius: 4px; padding: 12px; margin-bottom: 20px; font-size: 0.85rem; color: #2ecc71;">
                            {{ session('security_success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div style="background: rgba(235, 77, 75, 0.15); border: 1px solid #eb4d4b; border-radius: 4px; padding: 12px; margin-bottom: 20px; font-size: 0.85rem; color: #ff7675;">
                            <ul style="margin: 0; padding-left: 15px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="admin-form-grid">
                        <div class="form-group">
                            <label for="security-email">Login Email Address</label>
                            <input type="email" id="security-email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="security-password">New Password (Leave blank to keep current)</label>
                            <input type="password" id="security-password" name="password" class="form-control" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <label for="security-password-confirm">Confirm New Password</label>
                            <input type="password" id="security-password-confirm" name="password_confirmation" class="form-control" placeholder="••••••••">
                        </div>
                    </div>
                    <div class="form-actions" style="margin-top: 20px; padding-top: 0; border-top: none;">
                        <button type="submit" class="btn-admin btn-admin-primary">Update Credentials</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
