<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} | Portfolio</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
    <style>
        .detail-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .detail-card {
            background: var(--sidebar-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-card);
            backdrop-filter: blur(20px);
        }
        .detail-header {
            margin-bottom: 20px;
        }
        .detail-title {
            font-size: 2.2rem;
            font-family: var(--font-display);
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 10px 0;
            letter-spacing: -0.02em;
        }
        .detail-subtitle {
            font-size: 1.1rem;
            color: var(--accent-primary);
            font-weight: 500;
            margin: 0;
        }
        .detail-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 24px;
            margin-bottom: 30px;
        }
        .detail-banner {
            width: 100%;
            height: 380px;
            object-fit: cover;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: 35px;
        }
        .detail-content {
            font-size: 1.05rem;
            line-height: 1.75;
            color: var(--text-secondary);
        }
        .detail-content h1, .detail-content h2, .detail-content h3 {
            color: var(--text-primary);
            font-family: var(--font-display);
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 12px;
            letter-spacing: -0.01em;
        }
        .detail-content h1 { font-size: 1.75rem; }
        .detail-content h2 { font-size: 1.5rem; }
        .detail-content h3 { font-size: 1.25rem; }
        .detail-content p {
            margin-bottom: 20px;
        }
        .detail-content ul {
            margin-bottom: 24px;
            padding-left: 20px;
        }
        .detail-content li {
            margin-bottom: 8px;
        }
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color var(--transition-fast);
            margin-bottom: 20px;
        }
        .btn-back:hover {
            color: var(--text-primary);
        }

        /* Gallery Slider Styles */
        .detail-gallery-container {
            position: relative;
            width: 100%;
            height: 420px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: 35px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.2);
        }
        .detail-gallery-track {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }
        .detail-gallery-slide {
            min-width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .detail-gallery-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .gallery-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            backdrop-filter: blur(10px);
            transition: all var(--transition-fast);
            z-index: 10;
        }
        .gallery-nav-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: var(--accent-primary);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }
        .gallery-btn-prev { left: 15px; }
        .gallery-btn-next { right: 15px; }
        .gallery-indicators {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }
        .gallery-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all var(--transition-fast);
        }
        .gallery-dot.active {
            background: var(--accent-primary);
            transform: scale(1.2);
            box-shadow: 0 0 8px var(--accent-primary);
        }
    </style>
</head>
<body data-theme="dark">
    <!-- Spotlight cursor glow -->
    <div id="cursorGlow" class="cursor-glow"></div>

    <div class="detail-container">
        <a href="{{ route('home') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>

        <article class="detail-card">
            <span class="tech-card-index">// SYS_PROJECT_DETAIL</span>

            @php
                $slides = [];
                if ($project->cover_image) {
                    $slides[] = $project->cover_image;
                }
                if ($project->images && is_array($project->images)) {
                    $slides = array_merge($slides, $project->images);
                }
            @endphp

            @if(count($slides) > 0)
                <div class="detail-gallery-container">
                    <div class="detail-gallery-track" id="galleryTrack">
                        @foreach($slides as $slide)
                            <div class="detail-gallery-slide">
                                <img src="{{ Str::startsWith($slide, 'http') ? $slide : asset('storage/' . $slide) }}" alt="Project Screenshot">
                            </div>
                        @endforeach
                    </div>
                    
                    @if(count($slides) > 1)
                        <button type="button" class="gallery-nav-btn gallery-btn-prev" id="galleryPrevBtn" aria-label="Previous image">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button type="button" class="gallery-nav-btn gallery-btn-next" id="galleryNextBtn" aria-label="Next image">
                            <i class="fas fa-chevron-right"></i>
                        </button>

                        <div class="gallery-indicators" id="galleryIndicators">
                            @foreach($slides as $index => $slide)
                                <span class="gallery-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <div class="detail-header">
                <h1 class="detail-title">{{ $project->title }}</h1>
                @if($project->subtitle)
                    <div class="detail-subtitle">{{ $project->subtitle }}</div>
                @endif
            </div>

            <div class="detail-meta-row">
                <!-- Tech Brand Icons -->
                <div class="project-slide-techs" style="margin: 0; font-size: 1.5rem; gap: 16px;">
                    @if($project->technologies)
                        @foreach($project->technologies as $tech)
                            @php
                                $tech = strtolower(trim($tech));
                                $icon = 'fas fa-code';
                                $color = 'var(--text-muted)';
                                if($tech === 'php') { $icon = 'fab fa-php'; $color = '#a29bfe'; }
                                elseif($tech === 'mysql' || $tech === 'database') { $icon = 'fas fa-database'; $color = '#00cec9'; }
                                elseif($tech === 'js' || $tech === 'javascript') { $icon = 'fab fa-js'; $color = '#ffeaa7'; }
                                elseif($tech === 'html5') { $icon = 'fab fa-html5'; $color = '#ff7675'; }
                                elseif($tech === 'css3') { $icon = 'fab fa-css3-alt'; $color = '#74b9ff'; }
                                elseif($tech === 'git' || $tech === 'github') { $icon = 'fab fa-github'; $color = '#ffffff'; }
                                elseif($tech === 'figma') { $icon = 'fab fa-figma'; $color = '#a55eea'; }
                            @endphp
                            <i class="{{ $icon }}" title="{{ strtoupper($tech) }}" style="color: {{ $color }};"></i>
                        @endforeach
                    @endif
                </div>

                <!-- Links Buttons -->
                <div class="project-item-links" style="margin: 0;">
                    @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" title="GitHub Repository"><i class="fab fa-github"></i></a>
                    @endif
                    @if($project->live_link)
                        <a href="{{ $project->live_link }}" target="_blank" title="Live Demo"><i class="fas fa-external-link-alt"></i></a>
                    @endif
                </div>
            </div>

            <div class="detail-content">
                {!! Illuminate\Support\Str::markdown($project->content) !!}
            </div>
        </article>
    </div>

    <script src="{{ asset('js/portfolio.js') }}"></script>
    @if(count($slides) > 1)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('galleryTrack');
            const slides = document.querySelectorAll('.detail-gallery-slide');
            const dots = document.querySelectorAll('.gallery-dot');
            const prevBtn = document.getElementById('galleryPrevBtn');
            const nextBtn = document.getElementById('galleryNextBtn');
            let currentIndex = 0;

            function updateSlider(index) {
                currentIndex = index;
                track.style.transform = `translateX(-${currentIndex * 100}%)`;
                
                // Update indicators
                dots.forEach((dot, idx) => {
                    dot.classList.toggle('active', idx === currentIndex);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    let nextIndex = (currentIndex + 1) % slides.length;
                    updateSlider(nextIndex);
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    let prevIndex = (currentIndex - 1 + slides.length) % slides.length;
                    updateSlider(prevIndex);
                });
            }

            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const index = parseInt(dot.getAttribute('data-slide'));
                    updateSlider(index);
                });
            });
        });
    </script>
    @endif
</body>
</html>
