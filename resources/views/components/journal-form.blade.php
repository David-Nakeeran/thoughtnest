@props(['update' => false, 'journal' => null])

@if (!$update)
    <form method="POST" action="/journals" class="flex flex-col">
        @csrf
        <label for="content">Journal Entry</label>
        <textarea type="text" id="content" name="content" required></textarea>
        <x-form-error field="content" />
        <button type="submit">Submit</button>
    </form>
@else
    <form method="POST" action="/journals/{{ $journal->id }}" class="flex flex-col">
        @csrf
        @method('PATCH')
        <label for="content">Update Journal Entry</label>
        <textarea type="text" id="content" name="content" required>{{ $journal->content }}</textarea>
        <x-form-error field="content" />
        <button type="submit">Submit</button>
    </form>
@endif
