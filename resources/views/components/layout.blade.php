<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Serif+Display&display=swap"
        rel="stylesheet">
    <title>ThoughtNest</title>
</head>

<body class="bg-background text-primary antialiased">
    <header x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
        :class="scrolled ?
            'bg-white/90 shadow-sm backdrop-blur border-b border-border' :
            'bg-transparent'"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
            <a href="/"
                class="text-2xl font-semibold tracking-tight text-primary hover:text-primary-accent transition">
                Thought<span class="text-primary-accent">Nest</span>
            </a>
            <nav>
                <x-menu />
            </nav>
        </div>
    </header>
    <main class="pt-20 min-h-screen">
        <div class="max-w-6xl mx-auto px-6 py-8 space-y-8">
            <x-toast />
            {{ $slot }}
        </div>
    </main>
    <footer class="border-t border-border mt-12">
        <div class="max-w-6xl mx-auto px-6 py-6 text-sm text-muted text-center">
            &copy; 2026 ThoughtNest
        </div>
    </footer>
</body>

</html>
