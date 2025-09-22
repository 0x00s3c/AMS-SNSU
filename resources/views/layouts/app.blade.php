<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SNSU Accreditation System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
        }
        .navbar-snsu {
            background-color: #165c26; /* SNSU Green */
        }
        .sidebar-snsu {
            background-color: #1d7a31;
            min-height: 100vh;
        }
        .sidebar-snsu .nav-link {
            color: #fff;
        }
        .sidebar-snsu .nav-link:hover,
        .sidebar-snsu .nav-link.active {
            background-color: #13511e;
        }
        .snsu-gold {
            color: #fbc02d; /* SNSU Yellow-Gold */
        }
        .dark-mode {
            background-color: #121212 !important;
            color: #e0e0e0 !important;
        }
        .dark-mode .navbar,
        .dark-mode .sidebar-snsu {
            background-color: #1f1f1f !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-snsu navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fa-solid fa-university snsu-gold"></i> SNSU AMS
        </a>
        <div class="ms-auto">
            <button class="btn btn-outline-light btn-sm" onclick="toggleDarkMode()" title="Toggle Dark Mode">
                <i class="fa-solid fa-moon"></i>
            </button>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar-snsu collapse" id="sidebarMenu">
            <div class="position-sticky p-3">

                @if(Auth::check() && Auth::user()->role == 'student')
                    <li class="nav-item">
                        <a href="{{ route('viewer.index') }}" class="nav-link">
                            <i class="fa-solid fa-eye me-1"></i> Public Viewer
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('viewer.index') }}">
                        <i class="fa-solid fa-globe"></i> Public Viewer
                    </a>
                </li>

                @auth
                    <p class="text-white small">👋 Hi, <strong>{{ Auth::user()->name }}</strong></p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fa-solid fa-home me-2"></i>Dashboard</a>
                        </li>

                        @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#adminMenu">
                                <i class="fa-solid fa-user-shield me-2"></i>Admin Tools <i class="fa fa-caret-down float-end"></i>
                            </a>
                            <div class="collapse ms-3" id="adminMenu">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">📊 Admin Panel</a>
                            </div>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role, ['faculty', 'qa', 'admin']))
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#docMenu">
                                <i class="fa-solid fa-folder me-2"></i>Documents <i class="fa fa-caret-down float-end"></i>
                            </a>
                            <div class="collapse ms-3" id="docMenu">
                                <a href="{{ route('documents.index') }}" class="nav-link">📁 View Documents</a>
                                <a href="{{ route('documents.create') }}" class="nav-link">📤 Upload Document</a>
                            </div>
                        </li>
                        @endif

                        @if(Auth::user()->role === 'qa')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#qaMenu">
                                <i class="fa-solid fa-clipboard-check me-2"></i>QA Panel <i class="fa fa-caret-down float-end"></i>
                            </a>
                            <div class="collapse ms-3" id="qaMenu">
                                <a href="#" class="nav-link">📝 Assign Tasks</a>
                                <a href="#" class="nav-link">⏰ Track Deadlines</a>
                            </div>
                        </li>
                        @endif

                        @if(Auth::user()->role === 'external')
                        <li class="nav-item">
                            <a href="{{ route('review.index') }}" class="nav-link"><i class="fa-solid fa-eye me-2"></i>Review</a>
                        </li>
                        @endif

                        <li class="nav-item mt-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fa-solid fa-arrow-right-from-bracket me-1"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </nav>

        <!-- Main -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4" id="main-content">
            @yield('content')
        </main>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        document.querySelector('.navbar').classList.toggle('bg-dark');
    }
</script>
</body>
</html>
