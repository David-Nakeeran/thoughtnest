<x-layout>
    <h1>Journal</h1>
    <p>{{ $journal['content'] }}</p>
    @foreach ($journal['comments'] as $comment)
        <p>therapist comments: {{ $comment['comment'] }} </p>
        <p>Created at: {{ date_format($comment['created_at'], 'd / m / Y') }}</p>
    @endforeach
    <p>Created at: {{ date_format($journal['created_at'], 'd / m / Y') }}</p>
    <x-journal-modal :update="true" :journal="$journal" type="Edit journal entry" />
</x-layout>
