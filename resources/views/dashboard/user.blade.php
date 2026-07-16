<x-layout>
    <section class="space-y-10">
        <div class="space-y-3">
            <h1 class="font-display text-4xl text-primary">
                Welcome back, {{ $user['name'] }}
            </h1>
            <p class="text-sm text-muted max-w-md leading-relaxed">
                Take a moment to check in with yourself or continue writing your thoughts.
            </p>
        </div>
        <div class="flex flex-wrap gap-3">
            <x-journal-modal type="Write a journal entry" />
            <a href="/journals"
                class="px-5 py-3 rounded-lg border border-border text-sm text-primary hover:bg-surface transition">
                View your entries
            </a>
        </div>
        <div class="border-t border-border pt-8 space-y-4">
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
        </div>
    </section>
</x-layout>
