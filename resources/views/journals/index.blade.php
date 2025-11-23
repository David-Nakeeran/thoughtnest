<x-layout>
    <h1>Journals</h1>
    @foreach ($journals as $entry)
        <p>{{ substr($entry['content'], 0, 100) }}...</p>
        <p>{{ $entry['comments_count'] }} therapist comments</p>
        <p>Created at: {{ date_format($entry['created_at'], 'd / m / Y') }}</p>
        <a href="/journals/{{ $entry['id'] }}">View Journal Entry</a>
    @endforeach
</x-layout>
