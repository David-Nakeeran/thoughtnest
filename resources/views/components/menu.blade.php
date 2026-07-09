<div class="hidden lg:flex items-center gap-6">
    @guest()
        <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
    @endguest
    @auth()
        <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
        @if (auth()->user()->role === 'user')
            <x-nav-link href="/journals" :active="request()->is('journals')">
                Journals
            </x-nav-link>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm font-medium text-muted hover:text-primary transition">
                Logout
            </button>
        </form>
    @endauth
</div>
<div class="block lg:hidden">
    <div x-cloak x-data="{ open: false }" x-init="$watch('open', value => document.body.classList.toggle('overflow-hidden', value))" @keydown.escape="open = false" class="relative">
        <button @click="open = !open" class="flex flex-col justify-center items-center w-8 h-8">
            <span class="block h-0.5 w-6 bg-primary-accent rounded transition-all duration-300"
                :class="open ? 'rotate-45 translate-y-1.5' : '-translate-y-1.5'"></span>
            <span class="block h-0.5 w-6 bg-primary-accent rounded my-1 transition-all duration-300"
                :class="open ? 'opacity-0' : 'opacity-100'"></span>
            <span class="block h-0.5 w-6 bg-primary-accent rounded transition-all duration-300"
                :class="open ? '-rotate-45 -translate-y-1.5' : 'translate-y-1.5'"></span>
        </button>
        <template x-teleport="body">
            <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-black/30 z-40">
            </div>
        </template>
        <template x-teleport="body">
            <div x-show="open" x-transition :class="open ? 'translate-x-0' : 'translate-x-full'"
                class="fixed top-0 right-0 h-screen w-2/3 max-w-sm bg-surface z-50 shadow-lg border-l border-border p-6 flex flex-col gap-6 transition-transform duration-300 overflow-y-auto">
                <button @click="open = false" class="self-end text-muted hover:text-muted text-xl cursor-pointer">
                    ✕
                </button>
                <nav class="flex flex-col gap-3">
                    @guest()
                        <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                    @endguest
                    @auth()
                        <x-nav-link href="/dashboard" :active="request()->is('dashboard*')">
                            Dashboard
                        </x-nav-link>
                        @if (auth()->user()->role === 'user')
                            <x-nav-link href="/journals" :active="request()->is('journals')">
                                Journals
                            </x-nav-link>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-left text-sm font-medium text-muted hover:text-primary transition px-3 py-2 rounded-lg hover:bg-background w-full cursor-pointer">
                                Logout
                            </button>
                        </form>
                    @endauth
                </nav>
            </div>
        </template>
    </div>
</div>
