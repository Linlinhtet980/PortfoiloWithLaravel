@extends('admin.layout')

@section('title', 'Dashboard Overview')

@section('content')
    <!-- Statistics Counter Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-label">Total Projects</span>
                <span class="stat-value">5</span>
            </div>
            <div class="stat-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-label">Active Skills</span>
                <span class="stat-value">11</span>
            </div>
            <div class="stat-icon">
                <i class="fas fa-laptop-code"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-label">Inbox Messages</span>
                <span class="stat-value">12</span>
            </div>
            <div class="stat-icon">
                <i class="fas fa-envelope"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-label">Profile Views</span>
                <span class="stat-value">1,420</span>
            </div>
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Row: Visitor Analytics (Real Chart) -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Profile Visitor Statistics (Monthly)</h3>
            <span class="stat-label">Realtime Analytics</span>
        </div>
        <div class="card-body">
            <div class="chart-container-large">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Secondary Charts Grid -->
    <div class="admin-form-grid">
        <!-- Top Projects Bar Chart -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Projects Visited</h3>
            </div>
            <div class="card-body">
                <div class="chart-container-medium">
                    <canvas id="projectsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Browser Share Doughnut Chart -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Browser Distribution</h3>
            </div>
            <div class="card-body">
                <div class="chart-container-medium">
                    <canvas id="browserChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Row: Recent Submissions -->
    <div class="admin-form-grid">
        <!-- Recent Messages list -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Inbox Messages</h3>
                <a href="{{ route('admin.messages') }}" class="btn-admin btn-admin-outline">View All</a>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nyein Chan</strong></td>
                                <td>Hi, I want to talk about a freelance Laravel project...</td>
                                <td><span class="status-badge status-unread">Unread</span></td>
                            </tr>
                            <tr>
                                <td><strong>Aung Aung</strong></td>
                                <td>Do you have experience in Vue.js or React? I saw your portfolio...</td>
                                <td><span class="status-badge status-read">Read</span></td>
                            </tr>
                            <tr>
                                <td><strong>Dr. Htein Linn</strong></td>
                                <td>Your B.Sc Mathematics and BBA background is very interesting...</td>
                                <td><span class="status-badge status-read">Read</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Projects list -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Projects</h3>
                <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">Manage</a>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Tech</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=100&h=60" alt="SMS" class="project-thumb"></td>
                                <td><strong>School Management System</strong></td>
                                <td><span class="tech-tag">PHP</span> <span class="tech-tag">MySQL</span></td>
                            </tr>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=100&h=60" alt="Movie" class="project-thumb"></td>
                                <td><strong>Movie App</strong></td>
                                <td><span class="tech-tag">JS</span> <span class="tech-tag">HTML5</span></td>
                            </tr>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=100&h=60" alt="Portfolio" class="project-thumb"></td>
                                <td><strong>Personal Portfolio</strong></td>
                                <td><span class="tech-tag">HTML5</span> <span class="tech-tag">CSS3</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ChartJS Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const isDark = document.body.getAttribute('data-theme') !== 'light';
            const textColor = isDark ? '#94a3b8' : '#475569';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.05)' : 'rgba(15, 23, 42, 0.05)';

            // 1. Visitor Chart (Line)
            const ctxVisitor = document.getElementById('visitorChart').getContext('2d');
            const visitorChart = new Chart(ctxVisitor, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Monthly Visitors',
                        data: [450, 780, 620, 1100, 950, 1420, 1250],
                        borderColor: '#0496FF',
                        backgroundColor: 'rgba(4, 150, 255, 0.04)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            grid: { color: gridColor },
                            ticks: { color: textColor }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: textColor }
                        }
                    }
                }
            });

            // 2. Projects Chart (Bar)
            const ctxProjects = document.getElementById('projectsChart').getContext('2d');
            const projectsChart = new Chart(ctxProjects, {
                type: 'bar',
                data: {
                    labels: ['School Sys', 'Movie App', 'Portfolio', 'Task Mgr', 'Chat App'],
                    datasets: [{
                        data: [420, 310, 540, 180, 290],
                        backgroundColor: [
                            '#0496FF',
                            '#03B5AA',
                            '#FA9F42',
                            '#10b981',
                            '#6366f1'
                        ],
                        borderWidth: 0,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            grid: { color: gridColor },
                            ticks: { color: textColor }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: textColor }
                        }
                    }
                }
            });

            // 3. Browser Chart (Doughnut)
            const ctxBrowser = document.getElementById('browserChart').getContext('2d');
            const browserChart = new Chart(ctxBrowser, {
                type: 'doughnut',
                data: {
                    labels: ['Chrome', 'Safari', 'Firefox', 'Edge', 'Others'],
                    datasets: [{
                        data: [65, 20, 8, 5, 2],
                        backgroundColor: [
                            '#0496FF',
                            '#03B5AA',
                            '#FA9F42',
                            '#10b981',
                            'rgba(255, 255, 255, 0.1)'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: textColor }
                        }
                    }
                }
            });

            // Theme Change Listener
            const themeBtn = document.getElementById('admin-theme-toggle');
            if (themeBtn) {
                themeBtn.addEventListener('click', () => {
                    setTimeout(() => {
                        const currentIsDark = document.body.getAttribute('data-theme') !== 'light';
                        const newTextColor = currentIsDark ? '#94a3b8' : '#475569';
                        const newGridColor = currentIsDark ? 'rgba(255, 255, 255, 0.05)' : 'rgba(15, 23, 42, 0.05)';

                        // Update charts config and redraw
                        [visitorChart, projectsChart].forEach(chart => {
                            chart.options.scales.y.grid.color = newGridColor;
                            chart.options.scales.y.ticks.color = newTextColor;
                            chart.options.scales.x.ticks.color = newTextColor;
                            chart.update();
                        });

                        browserChart.options.plugins.legend.labels.color = newTextColor;
                        browserChart.update();
                    }, 150);
                });
            }
        });
    </script>
@endsection
