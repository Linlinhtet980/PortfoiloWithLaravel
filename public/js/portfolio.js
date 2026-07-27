/**
 * Portfolio Frontend Interactions & Scripts
 */
document.addEventListener('DOMContentLoaded', () => {

    // ====== THEME TOGGLER (DARK/LIGHT) ======
    const themeToggleBtn = document.getElementById('theme-toggle');
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

    // ====== MOCK CONTACT FORM SUBMISSION ======
    const contactForm = document.getElementById('portfolioContactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            // Show sending state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            
            // Simulate API request delay
            setTimeout(() => {
                // Success Toast Feedback
                showToast('Success!', 'Thank you! Your message has been sent successfully.', 'success');
                
                // Reset form
                contactForm.reset();
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }, 1500);
        });
    }

    // ====== FLOATING TOAST NOTIFICATION ======
    function showToast(title, message, type = 'success') {
        // Create toast container if not exists
        let toastContainer = document.getElementById('toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toast-container';
            // Set styles directly on element via JS to keep CSS clean
            Object.assign(toastContainer.style, {
                position: 'fixed',
                bottom: '24px',
                right: '24px',
                zIndex: '9999',
                display: 'flex',
                flexDirection: 'column',
                gap: '12px'
            });
            document.body.appendChild(toastContainer);
        }

        // Create toast element
        const toast = document.createElement('div');
        Object.assign(toast.style, {
            background: 'var(--sidebar-bg)',
            border: '1px solid var(--border-color)',
            borderRadius: 'var(--radius-md)',
            padding: '16px 20px',
            boxShadow: 'var(--shadow-card)',
            backdropFilter: 'blur(20px)',
            color: 'var(--text-primary)',
            display: 'flex',
            alignItems: 'center',
            gap: '12px',
            minWidth: '300px',
            transform: 'translateY(20px)',
            opacity: '0',
            transition: 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)'
        });

        // Icon based on type
        const iconClass = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
        const iconColor = type === 'success' ? 'var(--accent-cyan)' : 'var(--accent-rose)';

        toast.innerHTML = `
            <i class="${iconClass}" style="color: ${iconColor}; font-size: 1.25rem;"></i>
            <div style="flex: 1;">
                <h4 style="font-size: 0.85rem; font-weight: 700; margin-bottom: 2px;">${title}</h4>
                <p style="font-size: 0.75rem; color: var(--text-secondary); line-height: 1.4;">${message}</p>
            </div>
            <button type="button" style="background:none; border:none; color:var(--text-muted); cursor:pointer; font-size:0.9rem;" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;

        toastContainer.appendChild(toast);

        // Animate entrance
        setTimeout(() => {
            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';
        }, 50);

        // Auto remove
        setTimeout(() => {
            toast.style.transform = 'translateY(-20px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    // ====== CURSOR GLOW TRACKER ======
    const glow = document.getElementById('cursorGlow');
    if (glow) {
        document.addEventListener('mousemove', (e) => {
            glow.style.left = e.clientX + 'px';
            glow.style.top = e.clientY + 'px';
            glow.style.opacity = '1';
        });

        document.addEventListener('mouseleave', () => {
            glow.style.opacity = '0';
        });
    }

    // ====== ABOUT ME MODAL TOGGLE ======
    const readMoreAboutBtn = document.getElementById('readMoreAboutBtn');
    const closeAboutModal = document.getElementById('closeAboutModal');
    const aboutModal = document.getElementById('aboutModal');

    if (readMoreAboutBtn && closeAboutModal && aboutModal) {
        readMoreAboutBtn.addEventListener('click', () => {
            aboutModal.classList.add('show');
        });

        closeAboutModal.addEventListener('click', () => {
            aboutModal.classList.remove('show');
        });

        // Close when clicking overlay backdrop
        aboutModal.addEventListener('click', (e) => {
            if (e.target === aboutModal) {
                aboutModal.classList.remove('show');
            }
        });
    }

    // ====== FEATURED PROJECTS CAROUSEL SLIDER ======
    const slides = document.querySelectorAll('.project-slide');
    const dots = document.querySelectorAll('.indicator-dot');
    let currentSlide = 0;

    if (slides.length > 0) {
        function showSlide(index) {
            if (index >= slides.length) currentSlide = 0;
            else if (index < 0) currentSlide = slides.length - 1;
            else currentSlide = index;

            slides.forEach((slide, i) => {
                if (i === currentSlide) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });

            dots.forEach((dot, i) => {
                if (i === currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                showSlide(i);
            });
        });

        // Auto transition every 6 seconds
        let autoplayTimer = setInterval(() => {
            showSlide(currentSlide + 1);
        }, 6000);

        // Reset timer on manual dot navigation
        const resetAutoplay = () => {
            clearInterval(autoplayTimer);
            autoplayTimer = setInterval(() => {
                showSlide(currentSlide + 1);
            }, 6000);
        };

        dots.forEach(dot => dot.addEventListener('click', resetAutoplay));
    }

    // ====== ALL PROJECTS MODAL TOGGLE ======
    const seeAllProjectsBtn = document.getElementById('seeAllProjectsBtn');
    const closeProjectsModal = document.getElementById('closeProjectsModal');
    const projectsModal = document.getElementById('projectsModal');

    if (seeAllProjectsBtn && closeProjectsModal && projectsModal) {
        seeAllProjectsBtn.addEventListener('click', () => {
            projectsModal.classList.add('show');
        });

        closeProjectsModal.addEventListener('click', () => {
            projectsModal.classList.remove('show');
        });

        // Close when clicking overlay backdrop
        projectsModal.addEventListener('click', (e) => {
            if (e.target === projectsModal) {
                projectsModal.classList.remove('show');
            }
        });
    }

});
