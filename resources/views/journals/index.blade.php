<x-layout>
    <section class="space-y-10">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="space-y-2">
                <h1 class="font-display text-4xl text-primary">
                    Your journal
                </h1>
                <p class="max-w-md text-sm text-muted leading-relaxed">
                    Every entry is a place to pause, reflect and record your thoughts.
                </p>
            </div>
            <x-journal-modal type="Write a journal entry" />
        </div>
        <div class="border-t border-border"></div>
        <div class="space-y-6">
            @foreach ($journals as $entry)
                <article class="space-y-4 py-2">
                    <p class="text-primary leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($entry['content'], 180) }}
                    </p>
                    <div class="flex items-center justify-between text-sm text-muted">
                        <span>
                            {{ $entry['comments_count'] }}
                            {{ Str::plural('therapist comment', $entry['comments_count']) }}
                        </span>
                        <span>
                            {{ date_format($entry['created_at'], 'd M Y') }}
                        </span>
                    </div>
                    <a href="/journals/{{ $entry['id'] }}"
                        class="inline-block text-sm text-primary-accent hover:underline">
                        Read entry →
                    </a>
                </article>
                @unless ($loop->last)
                    <div class="border-t border-border"></div>
                @endunless
            @endforeach
        </div>
    </section>
</x-layout>
