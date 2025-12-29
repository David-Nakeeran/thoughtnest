<x-layout>
    <h1>Therapist dashboard</h1>
    @foreach ($assignedUsers as $item)
        <p>{{ $item->user->name }}</p>
    @endforeach
</x-layout>
