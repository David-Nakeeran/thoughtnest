@props(['active' => false])

<a {{ $attributes }}
    class="text-sm font-medium transition px-3 py-2 rounded-lg
    {{ $active ? 'bg-[#5B6CFF]/10 text-[#5B6CFF]' : 'text-[#6B7280] hover:text-[#1F2937] hover:bg-[#F1F5F9]' }}">
    {{ $slot }}
</a>
