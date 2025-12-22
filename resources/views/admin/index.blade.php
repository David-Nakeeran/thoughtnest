<x-layout>
    <h1>Admin assign users page</h1>
    @foreach ($unassignedUsers as $user)
        <p>{{ $user->name }}</p>
        <form method="POST" action="/therapist-assignments/{{ $user->id }}">
            @csrf
            <label for="therapist-select">Select therapist</label>
            <select name="therapist" id="therapist-select">
                @foreach ($therapists as $therapist)
                    <option value="{{ $therapist->id }}">{{ $therapist->name }}</option>
                @endforeach
            </select>
            <button type="submit">Assign Therapist</button>
        </form>
    @endforeach
</x-layout>
