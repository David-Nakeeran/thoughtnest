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

        <div>
            <button @click="showModal = true" x-data
                class="px-4 py-2 bg-[#2DD4BF] text-white text-sm font-medium rounded-xl hover:opacity-90 transition">
                Add Comment
            </button>
        </div>

        <div class="space-y-4">

            <h2 class="text-lg font-semibold">Your Comments</h2>

            @forelse ($journal['comments'] as $comment)
                <div class="bg-[#F0FDFA] border border-[#CCFBF1] p-4 rounded-xl space-y-3">

                    <p class="text-sm">
                        {{ $comment['comment'] }}
                    </p>

                    <div class="flex justify-between items-center text-xs text-[#6B7280]">
                        <span>{{ date_format($comment['created_at'], 'd M Y') }}</span>

                        <x-delete-dialog-box title="Delete" message="Are you sure you want to delete this comment?"
                            :actionRoute="route('comments.destroy', [
                                'user' => $user->id,
                                'journal' => $journal->id,
                                'comment' => $comment->id,
                            ])" />
                    </div>

                </div>
            @empty
                <p class="text-sm text-[#6B7280]">
                    No comments yet — add one to support the user.
                </p>
            @endforelse

        </div>

        <div x-cloak x-data="{ showModal: false }" @keydown.escape ="showModal=false">

            <div class="fixed inset-0 z-30 flex items-center justify-center bg-black/40 backdrop-blur-sm"
                x-show="showModal">

                <div class="w-full max-w-xl bg-white rounded-2xl border border-[#E5E7EB] shadow-lg p-6 space-y-4"
                    @click.away="showModal = false" x-show="showModal">

                    <div class="flex justify-between items-center">
                        <h5 class="text-lg font-semibold">Add Comment</h5>
                        <button @click="showModal = false" class="text-[#6B7280] hover:text-[#1F2937]">✕</button>
                    </div>

                    <form method="POST"
                        action="/therapist/users/{{ $user->id }}/journals/{{ $journal->id }}/comments"
                        class="space-y-4">

                        @csrf

                        <div class="space-y-1">
                            <label class="text-sm font-medium">Comment</label>
                            <textarea name="comment" required
                                class="w-full min-h-[100px] rounded-xl border border-[#E5E7EB] px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#2DD4BF]/30 focus:border-[#2DD4BF] resize-none"></textarea>
                            <x-form-error field="comment" />
                        </div>

                        <button type="submit"
                            class="w-full bg-[#2DD4BF] text-white py-2 rounded-xl text-sm font-medium hover:opacity-90 transition">
                            Submit Comment
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</x-layout>
