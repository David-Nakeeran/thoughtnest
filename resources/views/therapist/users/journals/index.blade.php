<x-layout>
    <h1>Index</h1>
    @foreach ($journals as $entry)
        <p>{{ substr($entry['content'], 0, 100) }}...</p>
        <p>{{ $entry['comments_count'] }} therapist comments</p>
        <p>Created at: {{ date_format($entry['created_at'], 'd / m / Y') }}</p>
        <a href="/therapist/users/{{ $user->id }}/journals/{{ $entry->id }}">View Entry</a>
    @endforeach
</x-layout>
