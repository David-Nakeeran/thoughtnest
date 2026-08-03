<x-layout>
    <section class="space-y-10">
        <div class="space-y-3">
            <h1 class="font-display text-4xl text-primary">
                Welcome back, {{ $user['name'] }}
            </h1>
            <p class="max-w-md text-sm text-muted leading-relaxed">
                Take a moment to check in with yourself or continue writing your thoughts.
            </p>
        </div>
        @if ($notifications->isNotEmpty())
            <section class="max-w-2xl border-l border-primary-accent/60 pl-6 space-y-6">
                <h2 class="font-display text-2xl text-primary">
                    New notifications
                </h2>
                <div class="space-y-7">
                    @foreach ($notifications as $notification)
                        <article class="flex gap-4">
                            <span class="mt-1.5 h-2.5 w-2.5 shrink-0 rounded-full bg-primary-accent" aria-hidden="true">
                            </span>
                            <div class="space-y-3">
                                <div class="space-y-1">
                                    <p class="text-sm text-primary leading-relaxed">
                                        <span class="font-medium">
                                            {{ $notification->data['therapist_name'] }}
                                        </span>
                                        commented on your journal entry.
                                    </p>
                                    <p class="text-xs text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="flex flex-wrap items-center gap-5">
                                    <a href="/journals/{{ $notification->data['journal_id'] }}"
                                        class="text-sm text-primary-accent hover:underline">
                                        View journal →
                                    </a>
                                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="text-sm text-muted hover:text-primary-accent hover:underline transition">
                                            Mark as read
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
            <div class="border-t border-border"></div>
        @endif
        <div class="flex flex-wrap gap-3">
            <x-journal-modal type="Write a journal entry" />
            <a href="/journals"
                class="px-5 py-3 rounded-lg border border-border text-sm text-primary hover:bg-surface transition">
                View your entries
            </a>
        </div>
        <section class="border-t border-border pt-8 space-y-4">
            <div class="space-y-2">
                <h2 class="font-display text-2xl text-primary">
                    Weekly check-in
                </h2>
                @if (!$hasMoodReportedThisWeek)
                    <p class="text-sm text-muted">
                        How have you been feeling this week?
                    </p>
                    <a href="{{ route('mood-reports.create') }}"
                        class="inline-block text-sm text-primary-accent hover:underline">
                        Complete your check-in →
                    </a>
                @else
                    <p class="text-sm text-muted">
                        Your mood check-in has been completed for this week.
                    </p>
                @endif
            </div>
        </section>
    </section>
</x-layout>
