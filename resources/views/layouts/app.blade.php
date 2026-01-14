<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Pengaduan Sarana & Prasarana Sekolah</a>

        @auth
            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
