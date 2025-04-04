<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neoliterature</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/index.js') }}" defer></script>
</head>
<body style="background-image: url('{{ asset('image/Wallpaper.png') }}'); background-size: cover; background-position: center;">
    <div>
        @yield('content')
    </div>
</body>
</html>

