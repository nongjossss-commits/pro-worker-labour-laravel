<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pro Worker Labour System</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    {{-- Tailwind CSS for specific styling if needed --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bs-primary: #F97316;
            --bs-primary-rgb: 249, 115, 22;
            --bs-body-font-family: 'Sarabun', sans-serif;
            --bs-body-bg: #f8fafc;
            --bs-border-color: #e2e8f0;
        }
        body { background-color: var(--bs-body-bg); }
        .main-layout { display: flex; min-height: 100vh; }
        #sidebar {
            width: 280px;
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,.05);
            padding: 1.5rem;
            flex-shrink: 0;
        }
        #sidebar .navbar-brand { font-weight: 700; color: var(--bs-primary); margin-bottom: 2rem; }
        .nav-item.active .nav-link {
            background-color: var(--bs-primary);
            color: white !important;
            border-radius: 0.5rem;
        }
        .nav-link {
            color: #475569;
            font-weight: 600;
            padding: 0.75rem 1rem;
            margin-bottom: 0.25rem;
        }
        .nav-link:hover {
             background-color: #f1f5f9;
             border-radius: 0.5rem;
        }
        #main-content { flex-grow: 1; padding: 1.5rem; }
        h2 { font-weight: 700; color: #1e293b; }
        .btn-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
        }
    </style>
</head>
<body>
    <div class="main-layout">
        <aside id="sidebar">
            <a class="navbar-brand fs-4" href="/"><i class="bi bi-building-fill-gear"></i> Pro Worker</a>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-pie-chart-fill me-2"></i>ภาพรวม</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-bell-fill me-2"></i>แจ้งเตือน</a>
                </li>
                <hr>
                
                <li class="nav-item {{ request()->routeIs('employers.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('employers.index') }}">
                        <i class="bi bi-person-vcard-fill me-2"></i>ข้อมูลนายจ้าง
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('importers.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('importers.index') }}">
                        <i class="bi bi-box-arrow-in-down-left me-2"></i>ข้อมูลบริษัทนำเข้า
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('agents.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('agents.index') }}">
                        <i class="bi bi-person-square me-2"></i>ข้อมูลเอเจนซี่
                    </a>
                </li>
                
                <li class="nav-item {{ request()->routeIs('delegates.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('delegates.index') }}">
                        <i class="bi bi-people-fill me-2"></i>ข้อมูลพนักงาน
                    </a>
                </li>
            </ul>
        </aside>
        <main id="main-content">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
