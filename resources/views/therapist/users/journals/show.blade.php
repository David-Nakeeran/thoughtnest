<x-layout>
    <section class="space-y-10">
        <article class="space-y-6">
            <header class="space-y-2">
                <h1 class="font-display text-4xl text-primary">
                    {{ $user->name }}
                </h1>
                <p class="text-sm text-muted">
                    Journal entry · {{ date_format($journal['created_at'], 'd M Y') }}
                </p>
            </header>
            <div class="border-t border-border pt-8">
                <p class="text-primary leading-8 whitespace-pre-line">
                    {{ $journal['content'] }}
                </p>
            </div>
        </article>
        <div class="flex flex-wrap gap-3">
            <div x-cloak x-data="{ showModal: false }" @keydown.escape.window="showModal = false">
                <button @click="showModal = true"
                    class="px-5 py-3 bg-primary-accent text-white text-sm rounded-lg hover:opacity-90 transition">
                    Leave a comment
                </button>
                <div x-show="showModal" x-transition.opacity
                    class="fixed inset-0 z-40 flex items-center justify-center bg-black/30 backdrop-blur-sm p-4">
                    <div x-show="showModal" x-transition @click.away="showModal = false"
                        class="w-full max-w-xl bg-surface border border-border rounded-lg p-8 space-y-6">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="font-display text-3xl text-primary">
                                    Leave a comment
                                </h2>
                                <p class="mt-1 text-sm text-muted">
                                    Your comment will be visible to the patient.
                                </p>
                            </div>
                            <button @click="showModal = false" class="text-muted hover:text-primary transition"
                                aria-label="Close">
                                ✕
                            </button>
                        </div>
                        <form method="POST"
                            action="/therapist/users/{{ $user->id }}/journals/{{ $journal->id }}/comments"
                            class="space-y-5">
                            @csrf
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium text-primary">
                                    Comment
                                </label>
                                <textarea name="comment" required
                                    class="w-full min-h-[180px] bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary leading-relaxed resize-y focus:outline-none focus:border-primary-accent transition"></textarea>
                                <x-form-error field="comment" />
                            </div>
                            <button type="submit"
                                class="w-full bg-primary-accent text-white py-3 rounded-lg text-sm font-medium hover:opacity-90 transition">
                                Save comment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="border-t border-border pt-8 space-y-6">
            <div class="space-y-2">
                <h2 class="font-display text-3xl text-primary">
                    Therapist comments
                </h2>
                <p class="text-sm text-muted">
                    Comments you've left for this journal entry.
                </p>
            </div>
            @forelse ($journal['comments'] as $comment)
                <article class="bg-surface border border-border rounded-lg p-6 space-y-4">
                    <p class="text-primary leading-relaxed">
                        {{ $comment['comment'] }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-muted">
                            {{ date_format($comment['created_at'], 'd M Y') }}
                        </span>
                        <x-delete-dialog-box title="Delete" message="Are you sure you want to delete this comment?"
                            :actionRoute="route('comments.destroy', [
                                'user' => $user->id,
                                'journal' => $journal->id,
                                'comment' => $comment->id,
                            ])" />
                    </div>
                </article>
            @empty
                <p class="text-sm text-muted">
                    No comments have been added yet.
                </p>
            @endforelse
        </section>
    </section>
</x-layout>
