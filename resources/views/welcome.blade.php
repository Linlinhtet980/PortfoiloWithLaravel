<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lin Thu Rein Htet | Portfolio</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>
    <!-- Floating cursor glow tracker -->
    <div class="cursor-glow" id="cursorGlow"></div>

    <!-- Header Navbar -->
    <header class="portfolio-header">
        <div class="logo-container">
            <a href="/" class="logo-text">&lt;LTRH /&gt;</a>
        </div>
        <nav class="nav-links">
            <a href="#about" class="nav-link">About</a>
            <a href="#projects" class="nav-link">Projects</a>
            <a href="#skills" class="nav-link">Skills</a>
            <a href="#contact" class="nav-link">Contact</a>
        </nav>
        <div class="nav-actions">
            <!-- Theme toggle button -->
            <button class="theme-toggle-btn" id="theme-toggle" aria-label="Toggle theme">
                <i class="fas fa-moon"></i>
            </button>
            <!-- Lock icon redirecting to Admin panel -->
            <a href="/admin" class="admin-btn" title="Admin Dashboard" aria-label="Admin Panel">
                <i class="fas fa-user-shield"></i>
            </a>
        </div>
    </header>

    <!-- Bento Grid Content -->
    <div class="portfolio-container">
        <div class="bento-grid-v2">
            
            <!-- COLUMN 1: Left -->
            <div class="bento-column">
                <!-- Cell 2: Hero Profile Card (Tall) -->
                <section class="bento-card hero-card-v2" id="hero-cell">
                    <span class="tech-card-index">// SYS_HERO_INFO</span>
                    <div class="hero-header-v2">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=150&h=150" alt="Lin Thu Rein Htet" class="hero-avatar">
                        <h1 class="hero-title">Lin Thu Rein Htet</h1>
                        <p class="hero-subtitle">Available for Freelance</p>
                    </div>
                    <p class="hero-desc">
                        Full-Stack Developer specializing in Laravel, JavaScript, and custom styling. Passionate about building modular, pixel-perfect, and premium web applications.
                    </p>
                    <div class="social-icons-row" style="margin-left: 0; justify-content: center; width: 100%; margin-top: auto; padding-top: 15px;">
                        <a href="https://github.com/Linlinhtet980" target="_blank" class="social-icon-btn" title="GitHub"><i class="fab fa-github"></i></a>
                        <a href="https://linkedin.com/in/linthureinhtet" target="_blank" class="social-icon-btn" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://t.me/linthureinhtet" target="_blank" class="social-icon-btn" title="Telegram"><i class="fab fa-telegram"></i></a>
                    </div>
                </section>

                <!-- Cell 5: Services Offered -->
                <section class="bento-card services-card" id="services-cell">
                    <span class="tech-card-index">// SYS_SERVICES_OFFER</span>
                    <h3 class="card-title"><i class="fas fa-concierge-bell"></i> Services</h3>
                    <div class="services-list" style="justify-content: center; flex: 1;">
                        <div class="service-item-row">
                            <div class="service-icon-box">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="service-info-box">
                                <h4>Web App Development</h4>
                                <p>Custom websites and SaaS dashboards using Laravel and Vanilla CSS.</p>
                            </div>
                        </div>
                        <div class="service-item-row" style="margin-top: 10px;">
                            <div class="service-icon-box">
                                <i class="fas fa-server"></i>
                            </div>
                            <div class="service-info-box">
                                <h4>API integrations</h4>
                                <p>Secure RESTful API design and database modeling.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Cell 6: Recent Blog Posts -->
                <section class="bento-card blog-card" id="blog-cell">
                    <span class="tech-card-index">// SYS_BLOG_POSTS</span>
                    <h3 class="card-title"><i class="fas fa-pen-nib"></i> Latest Articles</h3>
                    <div class="blog-grid-list" style="justify-content: center; flex: 1;">
                        <a href="#" class="blog-item-row">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=70&h=50" alt="Laravel 11" class="blog-item-thumb">
                            <div class="blog-item-info">
                                <h4 class="blog-item-title">Getting Started with Laravel 11</h4>
                                <span class="blog-item-meta">Jul 20, 2026 • 324 views</span>
                            </div>
                        </a>
                        <a href="#" class="blog-item-row" style="margin-top: 10px;">
                            <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&q=80&w=70&h=50" alt="Bento UI" class="blog-item-thumb">
                            <div class="blog-item-info">
                                <h4 class="blog-item-title">Bento Grids Dominating Web UI</h4>
                                <span class="blog-item-meta">Jul 15, 2026 • 156 views</span>
                            </div>
                        </a>
                    </div>
                </section>
            </div>

            <!-- COLUMN 2: Center -->
            <div class="bento-column">
                <!-- Cell 3: About Me Card -->
                <section class="bento-card about-card" id="about-cell">
                    <span class="tech-card-index">// SYS_ABOUT_DEV</span>
                    <div class="about-card-content">
                        <h3 class="card-title"><i class="fas fa-user"></i> About Me</h3>
                        <p class="about-text">
                            I hold a B.Sc in Mathematics and a Bachelor of Business Administration (BBA). This unique combination fuels my analytical logical thinking and business-oriented development approach.
                        </p>
                        <p class="about-text">
                            I love translating complex business requirements into performant backend architectures and interactive user interfaces.
                        </p>
                        <button type="button" class="read-more-btn" id="readMoreAboutBtn">
                            Read More <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </section>

                <!-- Cell 1: Featured Projects Card (Large Center - Slider banner format) -->
                <section class="bento-card projects-card-v2" id="projects-cell">
                    <span class="tech-card-index">// SYS_FEATURED_PROJ</span>
                    <div class="projects-slider-container">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; width: 100%;">
                            <h3 class="card-title" style="margin: 0;"><i class="fas fa-project-diagram"></i> Featured Projects</h3>
                            <button type="button" class="btn-see-all" id="seeAllProjectsBtn">See All <i class="fas fa-external-link-alt" style="font-size: 0.75rem; margin-left: 4px;"></i></button>
                        </div>
                        
                        <!-- Slider Carousel -->
                        <div class="projects-slider">
                            <!-- Project Slide 1 -->
                            <article class="project-slide active">
                                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=600&h=300" alt="School System" class="project-slide-thumb">
                                <div class="project-slide-content">
                                    <h4 class="project-slide-title">School Management System</h4>
                                    <p class="project-slide-desc">Comprehensive database system to manage students, teachers, classes, and marks.</p>
                                    <div class="project-slide-techs">
                                        <i class="fab fa-php" title="PHP" style="color: #a29bfe;"></i>
                                        <i class="fas fa-database" title="MySQL" style="color: #00cec9;"></i>
                                        <i class="fab fa-js" title="JavaScript" style="color: #ffeaa7;"></i>
                                    </div>
                                    <div class="project-item-links">
                                        <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                                        <a href="#" title="Live Link"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                </div>
                            </article>

                            <!-- Project Slide 2 -->
                            <article class="project-slide">
                                <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=600&h=300" alt="Movie App" class="project-slide-thumb">
                                <div class="project-slide-content">
                                    <h4 class="project-slide-title">Movie Cataloging App</h4>
                                    <p class="project-slide-desc">Responsive movie library browsing with API data fetching and custom search filters.</p>
                                    <div class="project-slide-techs">
                                        <i class="fab fa-html5" title="HTML5" style="color: #ff7675;"></i>
                                        <i class="fab fa-css3-alt" title="CSS3" style="color: #74b9ff;"></i>
                                        <i class="fab fa-js" title="JavaScript" style="color: #ffeaa7;"></i>
                                    </div>
                                    <div class="project-item-links">
                                        <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <!-- Pagination indicator dots -->
                        <div class="slider-indicators">
                            <span class="indicator-dot active" data-slide="0"></span>
                            <span class="indicator-dot" data-slide="1"></span>
                        </div>
                    </div>
                </section>

                <!-- Cell 7: CV & Quick Info Card -->
                <section class="bento-card contact-info-card" id="cv-cell">
                    <span class="tech-card-index">// SYS_CV_DETAILS</span>
                    <h3 class="card-title"><i class="fas fa-address-book"></i> Address & CV</h3>
                    <div style="display: flex; flex-direction: column; gap: 12px; font-size: 0.85rem; color: var(--text-secondary); justify-content: center; flex: 1;">
                        <p><i class="fas fa-envelope" style="color: var(--accent-primary); margin-right: 8px;"></i> admin@ltrh.com</p>
                        <p><i class="fas fa-phone" style="color: var(--accent-primary); margin-right: 8px;"></i> +95 9 123 456 789</p>
                        <a href="#" class="btn-portfolio btn-portfolio-primary" style="margin-top: 6px; justify-content: center; width: 100%;">
                            <i class="fas fa-download"></i> Download Resume
                        </a>
                    </div>
                </section>
            </div>

            <!-- COLUMN 3: Right -->
            <div class="bento-column">
                <!-- Cell 4: Skills Card (Tall) -->
                <section class="bento-card skills-card-v2" id="skills-cell">
                    <span class="tech-card-index">// SYS_TECH_STACK</span>
                    <h3 class="card-title"><i class="fas fa-brain"></i> Skills & Stack</h3>
                    <div class="skills-badge-grid" style="grid-template-columns: repeat(2, 1fr); gap: 12px;">
                        <div class="skill-badge-item" style="padding: 12px 8px;">
                            <i class="fab fa-html5" style="color: #FA9F42; font-size: 1.4rem;"></i>
                            <span>HTML5</span>
                        </div>
                        <div class="skill-badge-item" style="padding: 12px 8px;">
                            <i class="fab fa-css3-alt" style="color: #0496FF; font-size: 1.4rem;"></i>
                            <span>CSS3</span>
                        </div>
                        <div class="skill-badge-item" style="padding: 12px 8px;">
                            <i class="fab fa-js" style="color: #f1c40f; font-size: 1.4rem;"></i>
                            <span>JavaScript</span>
                        </div>
                        <div class="skill-badge-item" style="padding: 12px 8px;">
                            <i class="fab fa-php" style="color: #8e44ad; font-size: 1.4rem;"></i>
                            <span>PHP</span>
                        </div>
                        <div class="skill-badge-item" style="padding: 12px 8px;">
                            <i class="fas fa-database" style="color: #03B5AA; font-size: 1.4rem;"></i>
                            <span>MySQL</span>
                        </div>
                        <div class="skill-badge-item" style="padding: 12px 8px;">
                            <i class="fab fa-git-alt" style="color: #e74c3c; font-size: 1.4rem;"></i>
                            <span>Git</span>
                        </div>
                        <div class="skill-badge-item" style="padding: 12px 8px; grid-column: span 2;">
                            <i class="fab fa-figma" style="color: #a29bfe; font-size: 1.4rem;"></i>
                            <span>Figma</span>
                        </div>
                    </div>
                </section>

                <!-- Cell 8: Live Status Card -->
                <section class="bento-card status-card" id="status-cell">
                    <span class="tech-card-index">// SYS_LIVE_STATUS</span>
                    <div style="display: flex; align-items: center; gap: 10px; margin: auto 0; width: 100%;">
                        <span class="status-pulse-dot"></span>
                        <span style="font-size: 0.85rem; font-weight: 600; color: var(--text-primary);">Yangon, MM</span>
                        <span style="font-size: 0.78rem; color: var(--text-muted); margin-left: auto;">Yangon Time</span>
                    </div>
                </section>

                <!-- Cell 9: Contact Form Card (Large) -->
                <section class="bento-card contact-card" id="contact-cell">
                    <span class="tech-card-index">// SYS_CONTACT_FORM</span>
                    <h3 class="card-title"><i class="fas fa-envelope"></i> Message Me</h3>
                    <form id="portfolioContactForm" class="contact-form-container" style="justify-content: center; flex: 1; display: flex; flex-direction: column; gap: 10px;">
                        <input type="text" class="contact-form-control" placeholder="Your Name" required>
                        <input type="email" class="contact-form-control" placeholder="Your Email Address" required>
                        <textarea class="contact-form-control" rows="3" placeholder="Your message here..." required></textarea>
                        <button type="submit" class="btn-contact-submit" style="width: 100%;">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </section>
            </div>

        </div>
    </div>

    <!-- About Me Modal Overlay -->
    <div class="portfolio-modal" id="aboutModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-user"></i> About Me</h3>
                <button type="button" class="modal-close-btn" id="closeAboutModal">&times;</button>
            </div>
            <div class="modal-body">
                <p>I hold a B.Sc in Mathematics and a Bachelor of Business Administration (BBA). This unique combination fuels my analytical logical thinking and business-oriented development approach.</p>
                <p>I love translating complex business requirements into performant backend architectures and interactive user interfaces.</p>
                <p>Beyond coding, I focus on software performance, clean-code architectures, and building modern digital experiences. Whether it is database optimizations, custom backend logic, or sleek UI animations, I strive for precision and premium outcomes.</p>
            </div>
        </div>
    </div>

    <!-- Projects Modal Overlay -->
    <div class="portfolio-modal" id="projectsModal">
        <div class="modal-content" style="max-width: 750px;">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-project-diagram"></i> All Projects</h3>
                <button type="button" class="modal-close-btn" id="closeProjectsModal">&times;</button>
            </div>
            <div class="modal-body" style="gap: 20px;">
                <!-- Project 1 -->
                <div class="project-modal-item">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=350&h=180" alt="School System" class="project-modal-thumb">
                    <div class="project-modal-info">
                        <h4>School Management System</h4>
                        <p>A comprehensive system designed for schools to manage pupil enrolment, classes, grading records, and teacher schedules securely.</p>
                        <div class="project-slide-techs" style="margin-top: 8px;">
                            <i class="fab fa-php" title="PHP" style="color: #a29bfe;"></i>
                            <i class="fas fa-database" title="MySQL" style="color: #00cec9;"></i>
                            <i class="fab fa-js" title="JavaScript" style="color: #ffeaa7;"></i>
                        </div>
                        <div class="project-item-links" style="margin-top: 12px;">
                            <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                            <a href="#" title="Live Link"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 5px 0;">
                <!-- Project 2 -->
                <div class="project-modal-item">
                    <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=350&h=180" alt="Movie App" class="project-modal-thumb">
                    <div class="project-modal-info">
                        <h4>Movie Cataloging App</h4>
                        <p>Browse, search, and catalog movies in a sleek responsive layout. Fetches movie details and reviews from public database APIs.</p>
                        <div class="project-slide-techs" style="margin-top: 8px;">
                            <i class="fab fa-html5" title="HTML5" style="color: #ff7675;"></i>
                            <i class="fab fa-css3-alt" title="CSS3" style="color: #74b9ff;"></i>
                            <i class="fab fa-js" title="JavaScript" style="color: #ffeaa7;"></i>
                        </div>
                        <div class="project-item-links" style="margin-top: 12px;">
                            <a href="#" title="GitHub Link"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script file -->
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
