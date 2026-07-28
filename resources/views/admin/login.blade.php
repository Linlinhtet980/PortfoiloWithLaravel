<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | LTRH Admin</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="login-wrapper">
        <!-- Glowing background decorators -->
        <div class="login-bg-glow"></div>
        <div class="login-bg-glow-2"></div>

        <div class="login-card">
            <div class="login-header">
                <div class="login-brand">&lt;LTRH /&gt;</div>
                <p class="login-subtitle">Sign in to manage your portfolio</p>
            </div>

            @if ($errors->any())
                <div style="background: rgba(235, 77, 75, 0.15); border: 1px solid #eb4d4b; border-radius: 4px; padding: 12px; margin-bottom: 20px; font-size: 0.85rem; color: #ff7675;">
                    <ul style="margin: 0; padding-left: 15px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="admin@gmail.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required autocomplete="current-password">
                </div>

                <div class="login-btn-container">
                    <button type="submit" class="btn-admin btn-admin-primary btn-login-submit">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
