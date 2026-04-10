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
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] shadow-sm space-y-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-xs text-[#6B7280]">User:</p>
                            <p class="font-semibold text-[#111827]">
                                {{ $user->name }}
                            </p>
                        </div>

                        <span class="text-xs bg-[#5B6CFF]/10 text-[#5B6CFF] px-3 py-1 rounded-full">
                            Unassigned
                        </span>

                    </div>

                    <form method="POST" action="/therapist-assignments/{{ $user->id }}"
                        class="flex flex-col sm:flex-row sm:items-end gap-3">

                        @csrf
                        <div class="flex-1 space-y-1">
                            <label class="text-xs text-[#6B7280]">Assign therapist:</label>

                            <select name="therapist"
                                class="w-full rounded-xl border border-[#E5E7EB] px-3 py-2 text-sm
                                       focus:outline-none focus:ring-2 focus:ring-[#5B6CFF]/30 focus:border-[#5B6CFF]">

                                <option disabled selected>Select a therapist</option>

                                @foreach ($therapists as $therapist)
                                    <option value="{{ $therapist->id }}">
                                        {{ $therapist->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit"
                            class="bg-[#5B6CFF] text-white px-4 py-2 rounded-xl text-sm font-medium
                                   hover:opacity-90 transition sm:h-[42px]">
                            Assign
                        </button>
                    </form>
                </div>
            @endforeach

        </div>

    </section>

</x-layout>
