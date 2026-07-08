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
                <div
                    class="bg-white p-5 rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-md transition flex items-center justify-between">

                    <span class="font-medium">
                        {{ $item->user->name }}
                    </span>
                    <div class="flex gap-5">
                        <a href="/therapist/users/{{ $item->user->id }}/mood-reports" class="text-sm text-[#5B6CFF]">View
                            Mood Reports →
                        </a>
                        <a href="/therapist/users/{{ $item->user->id }}/journals" class="text-sm text-[#5B6CFF]">
                            View Journals →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
