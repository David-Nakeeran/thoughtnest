<x-layout>
    <div class="mood-report-container">
        <h1>This week's mood check-in</h1>
        <p>This is just for you and your therapist.</p>
        <form action="/mood-reports" method="POST">
            @csrf
            <div class="field">
                <label for="mood">Mood <span class="range-hint">(1–10)</span></label>
                <input type="range" id="mood" name="mood" min="1" max="10" step="1"
                    value="{{ old('mood', 5) }}"
                    oninput="document.getElementById('mood-value').textContent = this.value">
                <span id="mood-value">{{ old('mood', 5) }}</span>
                <x-form-error field="mood" />
            </div>
            <div class="field">
                <label for="anxiety">Anxiety <span class="range-hint">(1–10)</span></label>
                <input type="range" id="anxiety" name="anxiety" min="1" max="10" step="1"
                    value="{{ old('anxiety', 5) }}"
                    oninput="document.getElementById('anxiety-value').textContent = this.value">
                <span id="anxiety-value">{{ old('anxiety', 5) }}</span>
                <x-form-error field="anxiety" />
            </div>
            <div class="field">
                <label for="stress">Stress <span class="range-hint">(1–10)</span></label>
                <input type="range" id="stress" name="stress" min="1" max="10" step="1"
                    value="{{ old('stress', 5) }}"
                    oninput="document.getElementById('stress-value').textContent = this.value">
                <span id="stress-value">{{ old('stress', 5) }}</span>
                <x-form-error field="stress" />
            </div>
            <div class="field">
                <label for="notes">Notes <span class="range-hint">(optional)</span></label>
                <textarea id="notes" name="notes" rows="4" placeholder="Anything on your mind this week?">{{ old('notes') }}</textarea>
                <x-form-error field="notes" />
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</x-layout>
