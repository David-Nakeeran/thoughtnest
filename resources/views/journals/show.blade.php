<x-layout>
    <section class="space-y-10">
        <article class="space-y-6">
            <header class="space-y-2">
                <h1 class="font-display text-4xl text-primary">
                    Journal entry
                </h1>
                <p class="text-sm text-muted">
                    {{ date_format($journal['created_at'], 'd M Y') }}
                </p>
            </header>
            <div class="border-t border-border pt-8">
                <p class="text-primary leading-8 whitespace-pre-line">
                    {{ $journal['content'] }}
                </p>
            </div>
        </article>
        <div class="flex flex-wrap gap-4 items-center">
            <x-journal-modal :update="true" :journal="$journal" type="Edit journal entry" />
            <x-delete-dialog-box title="Delete journal entry"
                message="Are you sure you want to delete this journal entry?" :actionRoute="route('journals.destroy', $journal)" />
        </div>
        <section class="border-t border-border pt-8 space-y-6">
            <div class="space-y-2">
                <h2 class="font-display text-3xl text-primary">
                    Therapist comments
                </h2>
                <p class="text-sm text-muted">
                    Comments left by your therapist will appear here.
                </p>
            </div>
            @forelse ($journal['comments'] as $comment)
                <article class="border border-border bg-surface rounded-lg p-6 space-y-3">
                    <p class="text-primary leading-relaxed">
                        {{ $comment['comment'] }}
                    </p>
                    <p class="text-sm text-muted">
                        {{ date_format($comment['created_at'], 'd M Y') }}
                    </p>
                </article>
            @empty
                <p class="text-sm text-muted">
                    No comments yet. Your therapist will respond when they're able.
                </p>
            @endforelse
        </section>
    </section>
</x-layout>
