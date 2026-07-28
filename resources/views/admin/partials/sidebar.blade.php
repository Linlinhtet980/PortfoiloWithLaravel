<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">&lt;LTRH /&gt;</a>
        <button class="sidebar-close-btn" aria-label="Close sidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <nav class="sidebar-menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.projects') }}" class="menu-item {{ Route::is('admin.projects*') ? 'active' : '' }}">
                <i class="fas fa-project-diagram"></i>
                <span>Projects</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.skills') }}" class="menu-item {{ Route::is('admin.skills*') ? 'active' : '' }}">
                <i class="fas fa-laptop-code"></i>
                <span>Skills</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.blog') }}" class="menu-item {{ Route::is('admin.blog*') ? 'active' : '' }}">
                <i class="fas fa-pen-nib"></i>
                <span>Blog</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.resume') }}" class="menu-item {{ Route::is('admin.resume*') || Route::is('admin.experience*') || Route::is('admin.services*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice"></i>
                <span>Resume & Services</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.messages') }}" class="menu-item {{ Route::is('admin.messages') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Messages</span>
            </a>
        </li>
    </nav>
    
    <div class="sidebar-footer">
        <div class="user-profile-toggle" id="userProfileToggle" role="button" tabindex="0">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=100&h=100" alt="Lin Thu Rein Htet" class="user-avatar">
            <div class="user-info">
                <h4 class="user-name">Lin Thu Rein Htet</h4>
                <span class="user-role">Administrator</span>
            </div>
            <i class="fas fa-chevron-up profile-chevron"></i>
        </div>

        <!-- Profile Dropup Menu -->
        <div class="profile-dropup" id="profileDropup">
            <a href="{{ route('admin.profile') }}" class="dropup-item">
                <i class="fas fa-user-cog"></i>
                <span>Profile Settings</span>
            </a>
            <hr class="dropup-divider">
            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="dropup-item logout-action-btn" onclick="document.getElementById('admin-logout-form').submit();" type="button">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </div>
    </div>
</aside>
