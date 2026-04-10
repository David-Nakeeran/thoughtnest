<x-layout>

    <section class="space-y-6">

        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] shadow-sm space-y-4">

            <h1 class="text-xl font-semibold">Journal Entry</h1>

            <p class="text-sm leading-relaxed">
                {{ $journal['content'] }}
            </p>

            <p class="text-xs text-[#6B7280]">
                {{ date_format($journal['created_at'], 'd M Y') }}
            </p>

        </div>

        <div class="flex flex-wrap gap-3">

            <x-journal-modal :update="true" :journal="$journal" type="Edit journal entry" />

            <x-delete-dialog-box title="Delete Journal Entry"
                message="Are you sure you want to delete this journal entry?" :actionRoute="route('journals.destroy', $journal)" />

        </div>

        <div class="space-y-4">

            <h2 class="text-lg font-semibold">Therapist Support</h2>

            @forelse ($journal['comments'] as $comment)
                <div class="bg-[#F0FDFA] border border-[#CCFBF1] p-4 rounded-xl space-y-2">

                    <p class="text-sm">
                        {{ $comment['comment'] }}
                    </p>

                    <p class="text-xs text-[#6B7280]">
                        {{ date_format($comment['created_at'], 'd M Y') }}
                    </p>

                </div>
            @empty
                <p class="text-sm text-[#6B7280]">
                    No comments yet — your therapist will respond when available.
                </p>
            @endforelse

        </div>

    </section>

</x-layout>
