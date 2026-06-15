<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'CRUD Data Barang' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">
        <div class="container nav-content">
            <h1>CRUD Data Barang</h1>
            <a href="{{ route('barangs.index') }}">Beranda</a>
        </div>
    </nav>

    <main class="container main-content">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>Tugas Deployment Laravel ke Vercel</p>
        </div>
    </footer>
</body>
</html>