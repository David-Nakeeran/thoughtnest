@props(['active' => false])

<a {{ $attributes }}
    class="text-sm font-medium transition px-3 py-2 rounded-lg
    {{ $active ? 'bg-primary-accent/10 text-primary-accent' : 'text-muted hover:text-primary hover:bg-background' }}">
    {{ $slot }}
</a>
