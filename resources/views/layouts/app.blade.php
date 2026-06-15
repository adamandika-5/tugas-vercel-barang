<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'CRUD Data Barang' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(124, 58, 237, 0.22), transparent 32%),
                radial-gradient(circle at top right, rgba(16, 185, 129, 0.12), transparent 28%),
                linear-gradient(135deg, #0f1020 0%, #111827 45%, #17112a 100%);
            color: #f8fafc;
        }

        a {
            color: inherit;
        }

        .container {
            width: min(1180px, 92%);
            margin: 0 auto;
        }

        .navbar {
            border-bottom: 1px solid rgba(167, 139, 250, 0.25);
            background: rgba(15, 16, 32, 0.92);
            backdrop-filter: blur(16px);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 0;
        }

        .nav-content h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.03em;
            background: linear-gradient(90deg, #8b5cf6, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-content a {
            color: #c4b5fd;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s ease;
        }

        .nav-content a:hover {
            color: #ffffff;
        }

        .main-content {
            min-height: 74vh;
            padding: 48px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            margin-bottom: 34px;
        }

        .page-header h2 {
            margin: 0 0 10px;
            font-size: clamp(34px, 5vw, 54px);
            line-height: 1;
            letter-spacing: -0.06em;
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .page-header p {
            margin: 0;
            color: #c4b5fd;
            font-size: 17px;
        }

        .alert-success {
            margin-bottom: 34px;
            padding: 20px 24px;
            border-radius: 22px;
            border: 1px solid rgba(16, 185, 129, 0.45);
            background: rgba(6, 78, 59, 0.38);
            color: #6ee7b7;
            font-weight: 800;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.22);
        }

        .card {
            background: rgba(30, 27, 75, 0.55);
            border: 1px solid rgba(139, 92, 246, 0.35);
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 28px 90px rgba(0, 0, 0, 0.32);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid rgba(139, 92, 246, 0.28);
        }

        th {
            background: rgba(88, 28, 135, 0.45);
            color: #c4b5fd;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.1em;
        }

        th,
        td {
            padding: 18px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(139, 92, 246, 0.18);
        }

        td {
            color: #f8fafc;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(139, 92, 246, 0.12);
        }

        .empty {
            text-align: center;
            padding: 72px 20px;
            color: #a78bfa;
            font-style: italic;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 999px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: 0.3s ease;
            color: #ffffff;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #9333ea);
            box-shadow: 0 14px 35px rgba(124, 58, 237, 0.35);
        }

        .btn-secondary {
            background: rgba(148, 163, 184, 0.25);
            border: 1px solid rgba(226, 232, 240, 0.2);
        }

        .btn-info {
            background: rgba(14, 165, 233, 0.85);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.9);
        }

        .btn-danger {
            background: rgba(220, 38, 38, 0.9);
        }

        .action,
        .detail-action {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .action form,
        .detail-action form {
            margin: 0;
        }

        .form-card {
            max-width: 760px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #ddd6fe;
            font-weight: 800;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid rgba(167, 139, 250, 0.35);
            border-radius: 18px;
            padding: 14px 16px;
            background: rgba(15, 23, 42, 0.75);
            color: #ffffff;
            font-size: 15px;
            outline: none;
            transition: 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #a78bfa;
            box-shadow: 0 0 0 4px rgba(167, 139, 250, 0.18);
        }

        .form-group small {
            display: block;
            margin-top: 6px;
            color: #fca5a5;
            font-weight: 700;
        }

        .detail-card p {
            margin: 0 0 16px;
            color: #ddd6fe;
            font-size: 17px;
        }

        .detail-card strong {
            color: #ffffff;
        }

        .pagination {
            margin-top: 24px;
            color: #c4b5fd;
        }

        .footer {
            border-top: 1px solid rgba(167, 139, 250, 0.22);
            padding: 26px 0;
            background: rgba(15, 16, 32, 0.85);
            color: #a78bfa;
            font-weight: 700;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }

        @media (max-width: 760px) {
            .nav-content,
            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .card {
                padding: 18px;
                border-radius: 22px;
            }

            th,
            td {
                padding: 14px;
                font-size: 14px;
            }

            .btn {
                width: 100%;
            }

            .action,
            .detail-action {
                flex-direction: column;
                align-items: stretch;
            }

            .action form,
            .detail-action form {
                width: 100%;
            }
        }
    </style>
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
        <p>Tugas Deployment Laravel ke Vercel</p>
    </footer>
</body>
</html>