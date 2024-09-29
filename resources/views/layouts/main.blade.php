<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <header class="bg-primary text-white text-center py-3">
        <h1>Manajemen Tugas</h1>
        <nav>
            <a href="{{ route('tasks.index') }}" class="text-white mx-2">Daftar Tugas</a>
            <a href="{{ route('tasks.create') }}" class="text-white mx-2">Buat Tugas</a>
        </nav>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-light text-center py-3">
        <p>&copy; {{ date('Y') }} Manajemen Tugas. Semua hak dilindungi.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
