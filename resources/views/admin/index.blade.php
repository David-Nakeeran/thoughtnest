<x-layout>
    <h1>Admin assign users page</h1>
    @foreach ($unassignedUsers as $user)
        <p>{{ $user->name }}</p>
    @endforeach
</x-layout>
