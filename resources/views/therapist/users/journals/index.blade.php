<x-layout>

    <section class="space-y-6">

        <div>
            <h1 class="text-2xl font-semibold">User Journals</h1>
            <p class="text-sm text-[#6B7280]">
                Review entries and provide supportive feedback.
            </p>
        </div>

        <div class="grid gap-4">

            @foreach ($journals as $entry)
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] shadow-sm space-y-3">

                    <p class="text-sm leading-relaxed">
                        {{ substr($entry['content'], 0, 100) }}...
                    </p>

                    <div class="flex justify-between items-center text-xs text-[#6B7280]">
                        <span>{{ $entry['comments_count'] }} comments</span>
                        <span>{{ date_format($entry['created_at'], 'd M Y') }}</span>
                    </div>

                    <a href="/therapist/users/{{ $user->id }}/journals/{{ $entry->id }}"
                        class="inline-block text-sm font-medium text-[#5B6CFF] hover:underline">
                        View entry →
                    </a>

                </div>
            @endforeach

        </div>

    </section>

</x-layout>
