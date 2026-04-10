@if (!$update)
    <form method="POST" action="/journals" class="space-y-4">
        @csrf

        <div class="space-y-1">
            <label for="content" class="text-sm font-medium">Journal Entry</label>
            <textarea id="content" name="content" required
                class="w-full min-h-[120px] rounded-xl border border-[#E5E7EB] px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#5B6CFF]/30 focus:border-[#5B6CFF] resize-none"></textarea>
            <x-form-error field="content" />
        </div>

        <button type="submit"
            class="w-full bg-[#5B6CFF] text-white py-2 rounded-xl text-sm font-medium hover:opacity-90 transition">
            Submit
        </button>

    </form>
@else
    <form method="POST" action="/journals/{{ $journal->id }}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div class="space-y-1">
            <label for="content" class="text-sm font-medium">Update Journal Entry</label>
            <textarea id="content" name="content" required
                class="w-full min-h-[120px] rounded-xl border border-[#E5E7EB] px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#5B6CFF]/30 focus:border-[#5B6CFF] resize-none">{{ $journal->content }}</textarea>
            <x-form-error field="content" />
        </div>

        <button type="submit"
            class="w-full bg-[#5B6CFF] text-white py-2 rounded-xl text-sm font-medium hover:opacity-90 transition">
            Update
        </button>

    </form>
@endif
