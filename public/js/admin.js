/**
 * Admin Panel Interactions & JavaScript Logic
 */
document.addEventListener('DOMContentLoaded', () => {
    
    // ====== MOBILE SIDEBAR TOGGLE ======
    const sidebar = document.querySelector('.admin-sidebar');
    const toggleBtn = document.querySelector('.sidebar-toggle-btn');
    const closeBtn = document.querySelector('.sidebar-close-btn');
    
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.add('mobile-open');
        });
    }
    
    if (closeBtn && sidebar) {
        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('mobile-open');
        });
    }
    
    // Close sidebar on click outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 992 && sidebar && sidebar.classList.contains('mobile-open')) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('mobile-open');
            }
        }
    });

    // ====== TOAST ALERTS DISMISSAL ======
    const closeAlertButtons = document.querySelectorAll('.toast-close-btn');
    closeAlertButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const alert = btn.closest('.toast-alert');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateX(100%)';
                alert.style.transition = 'all 0.3s ease';
                setTimeout(() => alert.remove(), 300);
            }
        });
    });

    // Auto-dismiss alerts after 5 seconds
    const autoDismissAlerts = document.querySelectorAll('.toast-alert');
    autoDismissAlerts.forEach(alert => {
        setTimeout(() => {
            if (document.body.contains(alert)) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateX(100%)';
                alert.style.transition = 'all 0.3s ease';
                setTimeout(() => alert.remove(), 300);
            }
        }, 5000);
    });

    // ====== THEME TOGGLER (DARK/LIGHT) ======
    const themeToggleBtn = document.getElementById('admin-theme-toggle');
    const body = document.body;
    
    // Get saved theme or default to dark
    const savedTheme = localStorage.getItem('admin-theme') || 'dark';
    body.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('admin-theme', newTheme);
            updateThemeIcon(newTheme);
        });
    }

    function updateThemeIcon(theme) {
        if (!themeToggleBtn) return;
        if (theme === 'light') {
            themeToggleBtn.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            themeToggleBtn.innerHTML = '<i class="fas fa-moon"></i>';
        }
    }

    // ====== CUSTOM CATEGORY CARD SELECTOR ======
    const categoryCards = document.querySelectorAll('.category-select-item');
    const categoryHiddenInput = document.getElementById('skill-category');

    categoryCards.forEach(card => {
        card.addEventListener('click', () => {
            // Remove active class from all cards
            categoryCards.forEach(c => c.classList.remove('active'));
            // Add active class to clicked card
            card.classList.add('active');
            // Update hidden input value
            if (categoryHiddenInput) {
                categoryHiddenInput.value = card.getAttribute('data-value');
            }
        });
    });

    // ====== CUSTOM TAB SWITCHING ======
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            
            // Toggle active classes on buttons
            tabButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Toggle active classes on panels
            tabPanels.forEach(panel => {
                if (panel.id === targetId) {
                    panel.classList.add('active');
                } else {
                    panel.classList.remove('active');
                }
            });
        });
    });

    // ====== PROFILE DROPUP TOGGLE ======
    const profileToggle = document.getElementById('userProfileToggle');
    const profileDropup = document.getElementById('profileDropup');

    if (profileToggle && profileDropup) {
        profileToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            profileToggle.classList.toggle('active');
            profileDropup.classList.toggle('show');
        });

        // Click outside to close
        document.addEventListener('click', (e) => {
            if (!profileToggle.contains(e.target) && !profileDropup.contains(e.target)) {
                profileToggle.classList.remove('active');
                profileDropup.classList.remove('show');
            }
        });
    }

    // ====== PROFILE EDIT MODE TOGGLE ======
    const editProfileBtn = document.getElementById('edit-profile-btn');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const profileViewMode = document.getElementById('profile-view-mode');
    const profileEditMode = document.getElementById('profile-edit-mode');

    if (editProfileBtn && profileViewMode && profileEditMode) {
        editProfileBtn.addEventListener('click', () => {
            profileViewMode.classList.add('profile-mode-hidden');
            profileEditMode.classList.remove('profile-mode-hidden');
        });
    }

    if (cancelEditBtn && profileViewMode && profileEditMode) {
        cancelEditBtn.addEventListener('click', () => {
            profileEditMode.classList.add('profile-mode-hidden');
            profileViewMode.classList.remove('profile-mode-hidden');
        });
    }

});
