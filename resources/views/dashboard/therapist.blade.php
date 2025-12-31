<x-layout>
    <h1>Therapist dashboard</h1>
    @foreach ($assignedUsers as $item)
        <a href="/therapist/users/{{ $item->user->id }}/journals">{{ $item->user->name }}</a>
    @endforeach
</x-layout>
