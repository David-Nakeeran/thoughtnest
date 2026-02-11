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

<body class="bg-[#f8fafc] text-[#1c1c1c]">
    <header x-data="{ scrolled: false }" :class="scrolled ? 'bg-[#f8fafc]/95 shadow-md' : 'bg-[#2365dc]/20 shadow-md'"
        x-init="window.addEventListener('scroll', (e) => { scrolled = window.scrollY > 50 })"
        class="fixed top-0 left-0 w-full z-50 flex justify-between px-6 transition-all duration-300">
        <h1>
            ThoughNest
        </h1>
        <nav>
            <x-menu />
        </nav>
    </header>
    <main>
        <x-toast />
        {{ $slot }}
    </main>
    <footer>&copy; 2025 ThoughtNest</footer>
</body>

</html>
