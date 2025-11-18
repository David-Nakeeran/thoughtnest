<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <title>ThoughtNest</title>
</head>

<body>
    <header class="flex justify-between">
        <h1>
            ThoughNest
        </h1>
        <nav>
            <x-menu />
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>&copy; 2025 ThoughtNest</footer>
</body>

</html>
