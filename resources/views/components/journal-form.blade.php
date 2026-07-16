@if (!$update)
    <form method="POST" action="/journals" class="space-y-5">
        @csrf
        <div class="space-y-1.5">
            <label for="content" class="text-sm font-medium text-primary">
                Journal entry
            </label>
            <textarea id="content" name="content" required
                class="w-full min-h-[180px] bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary leading-relaxed resize-y focus:outline-none focus:border-primary-accent transition"></textarea>
            <x-form-error field="content" />
        </div>
        <button type="submit"
            class="w-full bg-primary-accent text-white py-3 rounded-lg text-sm font-medium hover:opacity-90 transition">
            Save entry
        </button>
    </form>
@else
    <form method="POST" action="/journals/{{ $journal->id }}" class="space-y-5">
        @csrf
        @method('PATCH')
        <div class="space-y-1.5">
            <label for="content" class="text-sm font-medium text-primary">
                Journal entry
            </label>
            <textarea id="content" name="content" required
                class="w-full min-h-[180px] bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary leading-relaxed resize-y focus:outline-none focus:border-primary-accent transition">{{ $journal->content }}</textarea>
            <x-form-error field="content" />
        </div>
        <button type="submit"
            class="w-full bg-primary-accent text-white py-3 rounded-lg text-sm font-medium hover:opacity-90 transition">
            Save changes
        </button>
    </form>
@endif
