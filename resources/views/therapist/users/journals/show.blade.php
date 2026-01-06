<x-layout>
    <h1>Journal</h1>
    <p>{{ $journal['content'] }}</p>
    <p>Created at: {{ date_format($journal['created_at'], 'd / m / Y') }}</p>
    @foreach ($journal['comments'] as $comment)
        <p>therapist comments: {{ $comment['comment'] }} </p>
        <p>Created at: {{ date_format($comment['created_at'], 'd / m / Y') }}</p>
    @endforeach
    <div x-cloak x-data="{ showModal: false }" @keydown.escape ="showModal=false">
        <button type="button" @click="showModal = ! showModal">Add Comment</button>
        <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black opacity-85"
            x-show="showModal">
            <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = false"
                x-show="showModal">
                <div class="flex items-center justify-between">
                    <h5 class="mr-3 text-black max-w-none">Add Comment</h5>
                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form method="POST" action="/therapist/users/{{ $user->id }}/journals/{{ $journal->id }}/comments"
                    class="flex flex-col">
                    @csrf
                    <label for="comment">Enter Comment Below</label>
                    <textarea type="text" id="comment" name="comment" required>{{ $journal->comment }}</textarea>
                    <x-form-error field="comment" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
