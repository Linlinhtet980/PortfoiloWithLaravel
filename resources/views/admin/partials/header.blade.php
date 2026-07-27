<header class="admin-header">
    <div class="header-left">
        <button class="sidebar-toggle-btn" aria-label="Toggle mobile menu">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="page-title">@yield('title', 'Dashboard')</h2>
    </div>
    
    <div class="header-right">
        <a href="/" target="_blank" class="visit-site-link">
            <i class="fas fa-external-link-alt"></i>
            <span>Visit Site</span>
        </a>
        
        <button class="header-action-btn" aria-label="Notifications">
            <i class="fas fa-bell"></i>
            <span class="notification-badge"></span>
        </button>
        
        <button class="header-action-btn" id="admin-theme-toggle" aria-label="Toggle theme">
            <i class="fas fa-moon"></i>
        </button>
    </div>
</header>
