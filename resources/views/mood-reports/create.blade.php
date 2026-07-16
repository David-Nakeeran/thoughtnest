<x-layout>
    <section class="max-w-2xl space-y-10">
        <div class="space-y-3">
            <h1 class="font-display text-4xl text-primary">
                This week's check-in
            </h1>
            <p class="text-sm text-muted leading-relaxed max-w-lg">
                Take a few moments to reflect on how you've been feeling this week.
                Your responses will be shared with your therapist.
            </p>
        </div>
        <form method="POST" action="/mood-reports" class="space-y-8">
            @csrf
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <label class="font-medium text-primary">
                        Mood
                    </label>
                    <span id="mood-value" class="text-primary-accent">
                        {{ old('mood', 5) }}
                    </span>
                </div>
                <input type="range" id="mood" name="mood" min="1" max="10" step="1"
                    value="{{ old('mood', 5) }}" oninput="document.getElementById('mood-value').textContent=this.value"
                    class="w-full">
                <x-form-error field="mood" />
            </div>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <label class="font-medium text-primary">
                        Anxiety
                    </label>
                    <span id="anxiety-value" class="text-primary-accent">
                        {{ old('anxiety', 5) }}
                    </span>
                </div>
                <input type="range" id="anxiety" name="anxiety" min="1" max="10"
                    value="{{ old('anxiety', 5) }}"
                    oninput="document.getElementById('anxiety-value').textContent=this.value" class="w-full">
                <x-form-error field="anxiety" />
            </div>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <label class="font-medium text-primary">
                        Stress
                    </label>
                    <span id="stress-value" class="text-primary-accent">
                        {{ old('stress', 5) }}
                    </span>
                </div>
                <input type="range" id="stress" name="stress" min="1" max="10"
                    value="{{ old('stress', 5) }}"
                    oninput="document.getElementById('stress-value').textContent=this.value" class="w-full">
                <x-form-error field="stress" />
            </div>
            <div class="space-y-2">
                <label for="notes" class="text-sm font-medium text-primary">
                    Notes (optional)
                </label>
                <textarea id="notes" name="notes" rows="6"
                    class="w-full bg-surface border border-border rounded-lg px-4 py-3 resize-y focus:outline-none focus:border-primary-accent">{{ old('notes') }}</textarea>
                <x-form-error field="notes" />
            </div>
            <button class="bg-primary-accent text-white rounded-lg px-6 py-3 hover:opacity-90 transition">
                Save check-in
            </button>
        </form>
    </section>
</x-layout>
