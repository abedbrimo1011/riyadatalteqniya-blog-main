<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'لوحة التحكم - المدونة')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            text-align: right;
            background-color: #f8f9fa;
        }
        .navbar .nav-link {
            color: #fff !important;
        }
        .container {
            margin-top: 40px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">لوحة التحكم</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}">المقالات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">التصنيفات</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Bootstrap Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
