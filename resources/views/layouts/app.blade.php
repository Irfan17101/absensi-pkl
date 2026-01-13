<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Absensi PKL')</title>

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Sidebar */
        .app-sidebar {
            width: 250px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        @media (min-width: 992px) {
            .main-content {
                margin-left: 250px;
            }
        }

        .sidebar-link.active {
            background-color: rgba(13, 110, 253, .1);
            color: #0d6efd !important;
            font-weight: 600;
            border-left: 3px solid #0d6efd;
        }

        .sidebar-link:hover:not(.active) {
            background-color: rgba(0, 0, 0, .05);
        }

        /* Simple card shadow */
        .card-elevated {
            box-shadow: 0 4px 14px rgba(0, 0, 0, .06);
            border: none;
        }

        /* Small tweaks */
        .nav-brand {
            font-weight: 700;
            letter-spacing: .2px;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .app-sidebar {
                width: 100%;
                position: static;
                height: auto;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
        }

        /* Main content area */
        main {
            min-height: calc(100vh - 76px);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-light">

    @include('includes.navbar')

    <!-- Sidebar & Content -->
    <div class="d-flex">
        @include('includes.sidebar')

        <main class="main-content flex-grow-1 p-3 p-md-4">
            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    {{-- Bootstrap JS (bundle includes Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Logout helper for link --}}
    <script>
        function submitLogout() {
            const form = document.getElementById('logout-form');
            if (form) form.submit();
        }
    </script>

    @stack('scripts')
</body>
</html>