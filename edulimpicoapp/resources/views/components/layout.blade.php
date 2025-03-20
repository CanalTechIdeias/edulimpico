<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>Edulimpico</title>
</head>
<body>
    <main>
        {{ $slot }}
    </main>
</body>
</html>