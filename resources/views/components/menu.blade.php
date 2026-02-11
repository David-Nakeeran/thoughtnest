<div class="hidden lg:block">
    <h1>Desktop menu</h1>
</div>

<div class="block lg:hidden">
    <div x-cloak x-data="{ open: false }" x-init="open = false" x-on:click.outside="open = false"
        @keydown.escape="open = false" x-trap="open" role="menu" class="bg-gray-800">
        <button @click="open = !open" :aria-expanded="open" aria-label="main menu"
            class="flex flex-col justify-center items-center w-8 h-8 cursor-pointer">
            <span class="bg-[#b388ff] block transition-all duration-300 ease-out h-0.5 w-6 rounded-sm"
                :class="open ? 'rotate-45 translate-y-1.5' : '-translate-y-1.5'"></span>
            <span class="bg-[#b388ff] block transition-all duration-300 ease-out h-0.5 w-6 rounded-sm my-1"
                :class="open ? 'opacity-0' : 'opacity-100'"></span>
            <span class="bg-[#b388ff] block transition-all duration-300 ease-out h-0.5 w-6 rounded-sm"
                :class="open ? '-rotate-45 -translate-y-1.5' : 'translate-y-1.5'"></span>
        </button>
        <div :class="open ? 'translate-x-0' : 'translate-x-full z-60'"
            class="fixed top-0 right-0 h-screen w-1/2 bg-[#2a2a2c]/95 backdrop-blur-md shadow-lg p-6 flex flex-col items-center gap-4 transition-transform duration-300">
            <button @click="open = !open" class="self-end text-[#b388ff] font-bold text-3xl">
                x
            </button>
            <ul>
                @guest()
                    <li><x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link></li>
                    <li><x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link></li>
                @endguest
                @auth()
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-gray-300 hover:bg-white/5 hover:text-white rounded-md px-3 py-2 text-sm font-medium w-full text-left">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
