<x-layout>

    <section class="space-y-6">

        <div>
            <h1 class="text-2xl font-semibold">Therapist Dashboard</h1>
            <p class="text-sm text-[#6B7280]">
                View and support your assigned users.
            </p>
        </div>

        <div class="grid gap-4">

            @foreach ($assignedUsers as $item)
                <a href="/therapist/users/{{ $item->user->id }}/journals"
                    class="bg-white p-5 rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-md transition flex items-center justify-between">

                    <span class="font-medium">
                        {{ $item->user->name }}
                    </span>

                    <span class="text-sm text-[#5B6CFF]">
                        View journals →
                    </span>

                </a>
            @endforeach

        </div>

    </section>

</x-layout>
