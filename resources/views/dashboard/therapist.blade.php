<x-layout>
    <section class="space-y-10">
        <div class="space-y-2">
            <h1 class="font-display text-4xl text-primary">
                Your patients
            </h1>
            <p class="max-w-lg text-sm text-muted leading-relaxed">
                These are the people currently assigned to your care. You can review their journal entries and weekly
                check-ins.
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
                                            {{ $notification->data['user_name'] }}
                                        </span>
                                        added a new journal entry.
                                    </p>
                                    <p class="text-xs text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="flex flex-wrap items-center gap-5">
                                    <a href="{{ route('therapist.users.journals.show', [
                                        'user' => $notification->data['user_id'],
                                        'journal' => $notification->data['journal_id'],
                                    ]) }}"
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
        <section class="space-y-6">
            @forelse ($assignedUsers as $item)
                <article class="flex flex-col gap-5 py-2 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-lg font-medium text-primary">
                            {{ $item->user->name }}
                        </h2>
                        <p class="text-sm text-muted">
                            Assigned patient
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-5 text-sm">
                        <a href="/therapist/users/{{ $item->user->id }}/journals"
                            class="text-primary-accent hover:underline">
                            View journal →
                        </a>
                        <a href="/therapist/users/{{ $item->user->id }}/mood-reports"
                            class="text-primary-accent hover:underline">
                            View mood reports →
                        </a>
                    </div>
                </article>
                @unless ($loop->last)
                    <div class="border-t border-border"></div>
                @endunless
            @empty
                <p class="text-sm text-muted">
                    You don't currently have any assigned patients.
                </p>
            @endforelse
        </section>
    </section>
</x-layout>
