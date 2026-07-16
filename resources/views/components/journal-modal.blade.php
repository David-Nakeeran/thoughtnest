@props(['update' => false, 'journal' => null, 'type' => ''])

<div x-cloak x-data="{ showModal: false }" @keydown.escape.window="showModal = false">
    <button type="button" @click="showModal = true"
        class="px-5 py-3 bg-primary-accent text-white text-sm rounded-lg hover:opacity-90 transition">
        {{ $type }}
    </button>
    <div x-show="showModal" x-transition.opacity
        class="fixed inset-0 z-40 flex items-center justify-center bg-black/30 backdrop-blur-sm p-4">
        <div @click.away="showModal = false" x-show="showModal" x-transition
            class="w-full max-w-2xl rounded-lg border border-border bg-surface p-8">
            <div class="flex items-start justify-between mb-8">
                <div>
                    <h2 class="font-display text-3xl text-primary">
                        {{ $type }}
                    </h2>
                    <p class="mt-1 text-sm text-muted">
                        Write freely. You can come back and edit this later if you need to.
                    </p>
                </div>
                <button @click="showModal = false" class="text-muted hover:text-primary transition" aria-label="Close">
                    ✕
                </button>
            </div>
            <x-journal-form :update="$update" :journal="$journal" />
        </div>
    </div>
</div>
