<x-layout>
    <section class="space-y-10">
        <div class="space-y-2">
            <h1 class="font-display text-4xl text-primary">
                Therapist assignments
            </h1>
            <p class="max-w-lg text-sm text-muted leading-relaxed">
                Assign patients who haven't yet been connected with a therapist.
            </p>
        </div>
        @if ($unassignedUsers->isEmpty())
            <div class="border-t border-border pt-8">
                <p class="text-muted">
                    All patients are currently assigned to a therapist.
                </p>
            </div>
        @else
            <div class="space-y-6">
                @foreach ($unassignedUsers as $user)
                    <article class="bg-surface border border-border rounded-lg p-6 space-y-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-medium text-primary">
                                    {{ $user->name }}
                                </h2>
                                <p class="text-sm text-muted">
                                    Awaiting therapist assignment
                                </p>
                            </div>
                        </div>
                        <form method="POST" action="/therapist-assignments/{{ $user->id }}"
                            class="flex flex-col gap-4 md:flex-row md:items-end">
                            @csrf
                            <div class="flex-1 space-y-2">
                                <label class="text-sm font-medium text-primary">
                                    Therapist
                                </label>
                                <select name="therapist"
                                    class="w-full bg-surface border border-border rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-primary-accent transition">
                                    <option disabled selected>
                                        Select a therapist
                                    </option>
                                    @foreach ($therapists as $therapist)
                                        <option value="{{ $therapist->id }}">
                                            {{ $therapist->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button
                                class="bg-primary-accent text-white rounded-lg px-6 py-3 hover:opacity-90 transition">
                                Assign
                            </button>
                        </form>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
