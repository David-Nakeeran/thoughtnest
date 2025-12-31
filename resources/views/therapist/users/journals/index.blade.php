<x-layout>
    <h1>Index</h1>
    @foreach ($journals as $entry)
        <p>{{ $entry['content'] }}</p>
        <p>Created at: {{ date_format($entry['created_at'], 'd / m / Y') }}</p>
    @endforeach
</x-layout>
