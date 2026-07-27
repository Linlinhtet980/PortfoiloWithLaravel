<div class="alert-container">
    @if(session('success'))
        <div class="toast-alert alert-success">
            <span class="toast-icon"><i class="fas fa-check-circle"></i></span>
            <div class="toast-content">
                <h4 class="toast-title">Success</h4>
                <p class="toast-message">{{ session('success') }}</p>
            </div>
            <button class="toast-close-btn" aria-label="Close alert">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div class="toast-alert alert-error">
            <span class="toast-icon"><i class="fas fa-exclamation-circle"></i></span>
            <div class="toast-content">
                <h4 class="toast-title">Error</h4>
                <p class="toast-message">
                    @if(session('error'))
                        {{ session('error') }}
                    @else
                        {{ $errors->first() }}
                    @endif
                </p>
            </div>
            <button class="toast-close-btn" aria-label="Close alert">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>
