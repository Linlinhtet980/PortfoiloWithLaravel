<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | LTRH Admin</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Base and Admin Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="admin-wrapper">
        <!-- Sidebar Navigation -->
        @include('admin.partials.sidebar')

        <!-- Main Workspace -->
        <main class="admin-main">
            <!-- Top Dashboard Header -->
            @include('admin.partials.header')

            <!-- Main Dynamic Content -->
            <div class="admin-content">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Toast Alerts -->
    @include('admin.partials.alerts')

    <!-- Admin Panel Interaction Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
