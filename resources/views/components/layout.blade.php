<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>ThoughtNest</title>
</head>

<body>
    <header>
        <nav>
            <x-menu />
            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>&copy; 2025 ThoughtNest</footer>
</body>

</html>
