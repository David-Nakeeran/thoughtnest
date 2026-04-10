<div class="hidden lg:flex items-center gap-6">

    @guest()
        <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
    @endguest

    @auth()
        <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
        <x-nav-link href="/journals" :active="request()->is('journals')">Journals</x-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm font-medium text-[#6B7280] hover:text-[#1F2937] transition">
                Logout
            </button>
        </form>
    @endauth

</div>

<div class="block lg:hidden">
    <div x-cloak x-data="{ open: false }" @keydown.escape="open = false" x-on:click.outside="open = false"
        class="relative">

        <button @click="open = !open" class="flex flex-col justify-center items-center w-8 h-8">

            <span class="block h-0.5 w-6 bg-[#1F2937] rounded transition-all duration-300"
                :class="open ? 'rotate-45 translate-y-1.5' : '-translate-y-1.5'"></span>

            <span class="block h-0.5 w-6 bg-[#1F2937] rounded my-1 transition-all duration-300"
                :class="open ? 'opacity-0' : 'opacity-100'"></span>

            <span class="block h-0.5 w-6 bg-[#1F2937] rounded transition-all duration-300"
                :class="open ? '-rotate-45 -translate-y-1.5' : 'translate-y-1.5'"></span>
        </button>

        <div x-show="open" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40">
        </div>

        <div :class="open ? 'translate-x-0' : 'translate-x-full'"
            class="fixed top-0 right-0 h-full w-2/3 max-w-sm bg-white z-50 shadow-lg border-l border-[#E5E7EB] p-6 flex flex-col gap-6 transition-transform duration-300">

            <button @click="open = false" class="self-end text-[#6B7280] hover:text-[#1F2937] text-xl">
                ✕
            </button>
            <nav class="flex flex-col gap-3">

                @guest()
                    <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                    <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                @endguest

                @auth()
                    <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
                    <x-nav-link href="/journals" :active="request()->is('journals')">Journals</x-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-left text-sm font-medium text-[#6B7280] hover:text-[#1F2937] transition px-3 py-2 rounded-lg hover:bg-[#F1F5F9]">
                            Logout
                        </button>
                    </form>
                @endauth

            </nav>

        </div>
    </div>
</div>
