<x-layout>

    <section class="space-y-6">

        <div>
            <h1 class="text-2xl font-semibold">Assign Therapists</h1>
            <p class="text-sm text-[#6B7280]">
                Assign unallocated users to a therapist.
            </p>
        </div>

        <div class="grid gap-4">

            @foreach ($unassignedUsers as $user)
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] shadow-sm space-y-4">

                    <p class="font-medium">{{ $user->name }}</p>

                    <form method="POST" action="/therapist-assignments/{{ $user->id }}"
                        class="flex flex-col sm:flex-row gap-3 sm:items-center">
                        @csrf

                        <select name="therapist"
                            class="flex-1 rounded-xl border border-[#E5E7EB] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#5B6CFF]/30 focus:border-[#5B6CFF]">
                            @foreach ($therapists as $therapist)
                                <option value="{{ $therapist->id }}">
                                    {{ $therapist->name }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit"
                            class="bg-[#5B6CFF] text-white px-4 py-2 rounded-xl text-sm font-medium hover:opacity-90 transition">
                            Assign
                        </button>

                    </form>

                </div>
            @endforeach

        </div>

    </section>

</x-layout>
