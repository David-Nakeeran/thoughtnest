<div x-cloak x-data="{ show: false }" x-init="@if (session('success')) setTimeout(function(){show = true }, 100); @endif">
    <div x-show="show" role="status" aria-live="polite" x-effect="if(show) setTimeout(function(){show = false }, 3000)"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
        class="fixed top-6 left-1/2 -translate-x-1/2 bg-success/10 text-success border border-success/30 px-5 py-3 rounded-lg shadow-sm text-sm">
        <p>{{ session('success') }}</p>
    </div>
</div>
