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
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=150&h=150" alt="Lin Thu Rein Htet" class="profile-view-avatar">
                        <h2 class="profile-view-name">Lin Thu Rein Htet</h2>
                        <p class="profile-view-title">Full-Stack Developer</p>
                    </div>
                    
                    <div class="profile-details-list">
                        <div class="profile-detail-item">
                            <i class="fas fa-envelope"></i>
                            <span>admin@ltrh.com</span>
                        </div>
                        <div class="profile-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+95 9 123 456 789</span>
                        </div>
                        <div class="profile-detail-item">
                            <i class="fas fa-file-pdf"></i>
                            <a href="#" class="cv-download-link">Download CV / Resume</a>
                        </div>
                    </div>

                    <div class="profile-social-grid">
                        <a href="https://github.com/Linlinhtet980" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                        <a href="https://linkedin.com/in/linthureinhtet" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://t.me/linthureinhtet" target="_blank" title="Telegram"><i class="fab fa-telegram"></i></a>
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
                        I am a passionate Full-Stack Developer with over 3 years of experience building modern web applications. Specialized in Laravel, JavaScript, and custom responsive CSS designs. I love creating performant and beautiful user interfaces that solve real-world problems.
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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="admin-form-grid">
                            <!-- Basic details -->
                            <div class="form-group">
                                <label for="profile-name">Full Name</label>
                                <input type="text" id="profile-name" name="name" class="form-control" value="Lin Thu Rein Htet" required>
                            </div>

                            <div class="form-group">
                                <label for="profile-title">Job Title / Designation</label>
                                <input type="text" id="profile-title" name="title" class="form-control" value="Full-Stack Developer" required>
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
                                <input type="url" id="social-github" name="github" class="form-control" value="https://github.com/Linlinhtet980">
                            </div>

                            <div class="form-group">
                                <label for="social-linkedin">LinkedIn Link</label>
                                <input type="url" id="social-linkedin" name="linkedin" class="form-control" value="https://linkedin.com/in/linthureinhtet">
                            </div>

                            <div class="form-group">
                                <label for="social-telegram">Telegram Link</label>
                                <input type="url" id="social-telegram" name="telegram" class="form-control" value="https://t.me/linthureinhtet">
                            </div>

                            <div class="form-group">
                                <label for="social-phone">Contact Phone Number</label>
                                <input type="text" id="social-phone" name="phone" class="form-control" value="+95 9 123 456 789">
                            </div>

                            <!-- Full width bio -->
                            <div class="form-group form-group-full">
                                <label for="profile-bio">Bio / About Me Description</label>
                                <textarea id="profile-bio" name="bio" class="form-control" rows="5" placeholder="Tell visitors about your background, career, and coding philosophy..." required>I am a passionate Full-Stack Developer with over 3 years of experience building modern web applications. Specialized in Laravel, JavaScript, and custom responsive CSS designs. I love creating performant and beautiful user interfaces that solve real-world problems.</textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-admin btn-admin-outline" id="cancel-edit-btn">Cancel</button>
                            <button type="button" class="btn-admin btn-admin-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
