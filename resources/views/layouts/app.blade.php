<!DOCTYPE html>
<html lang="ar", dir = "rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="font-sans antialiased">
    {{-- يمكنك إضافة مكون التنقل هنا إذا كنت تملك واحداً --}}
    {{-- <x-navigation /> --}}

    <div class="min-h-screen bg-gray-100">
        <!-- Header Section -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Main content -->
        {{-- <main class="py-6">
            {{ $slot }}
        </main> --}}
        <main>
            @yield('content') {{-- ✅ هذا يستخدم مع @extends و @section --}}
        </main>
        
    </div>

    @stack('modals')
</body>
</html>
