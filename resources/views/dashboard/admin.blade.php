<x-layout>
    <section class="space-y-10">
        <div class="space-y-2">
            <h1 class="font-display text-4xl text-primary">
                Administration
            </h1>
            <p class="max-w-lg text-sm text-muted leading-relaxed">
                Manage therapist accounts and assign patients to their care.
            </p>
        </div>
        <div class="border-t border-border"></div>
        <div class="space-y-6">
            <article class="flex flex-col gap-3 py-2 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-lg font-medium text-primary">
                        Register therapist
                    </h2>
                    <p class="text-sm text-muted">
                        Create a new therapist account.
                    </p>
                </div>
                <a href="/register-therapist" class="text-sm text-primary-accent hover:underline">
                    Register →
                </a>
            </article>
            <div class="border-t border-border"></div>
            <article class="flex flex-col gap-3 py-2 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-lg font-medium text-primary">
                        Therapist assignments
                    </h2>
                    <p class="text-sm text-muted">
                        Assign patients to therapists.
                    </p>
                </div>
                <a href="/therapist-assignments" class="text-sm text-primary-accent hover:underline">
                    Manage →
                </a>
            </article>
        </div>
    </section>
</x-layout>
