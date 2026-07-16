<div x-cloak x-data="{ showModal: false }" @keydown.escape.window="showModal = false">
    <button type="button" @click="showModal = true" class="text-sm text-alert hover:underline transition">
        {{ $title }}
    </button>
    <div x-show="showModal" x-transition.opacity
        class="fixed inset-0 z-40 flex items-center justify-center bg-black/30 backdrop-blur-sm p-4">
        <div x-show="showModal" x-transition @click.away="showModal = false"
            class="w-full max-w-md bg-surface border border-border rounded-lg p-8 space-y-6">
            <div class="space-y-2">
                <h2 class="font-display text-3xl text-primary">
                    Delete entry
                </h2>
                <p class="text-sm text-muted leading-relaxed">
                    {{ $message }}
                </p>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" @click="showModal = false"
                    class="px-5 py-3 text-sm rounded-lg border border-border text-primary hover:bg-background transition">
                    Cancel
                </button>
                <form method="POST" action="{{ $actionRoute }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-5 py-3 bg-alert text-white text-sm rounded-lg hover:opacity-90 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
