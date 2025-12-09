<div x-cloak x-data = "{show: false}" x-init="@if (session('success')) setTimeout(function(){show = true }, 100); @endif">
    <div x-show="show" role="status" aria-live="polite" x-effect="if(show) setTimeout(function(){show = false }, 3000)"
        x-transition:enter="transition ease-out duration-400" x-transition:enter-start="opacity-0 translate-x-4"
        x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-4"
        class="fixed top-5 right-5 bg-[#effff3] text-[#00a63f] px-4 py-2 rounded shadow-lg">
        <p>{{ session('success') }}</p>
    </div>
</div>
