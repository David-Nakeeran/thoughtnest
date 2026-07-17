<x-layout>
    <section class="space-y-10">
        <div class="space-y-2">
            <h1 class="font-display text-4xl text-primary">
                Your patients
            </h1>
            <p class="max-w-lg text-sm text-muted leading-relaxed">
                These are the people currently assigned to your care. You can review their journal entries and weekly
                check ins.
            </p>
        </div>
        <div class="border-t border-border"></div>
        <div class="space-y-6">
            @foreach ($assignedUsers as $item)
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
            @endforeach
        </div>
    </section>
</x-layout>
