<script>
    var moodReport = {{ Js::from($moodReport) }};
</script>

<x-layout>
    <section class="space-y-10">
        <div class="space-y-2">
            <h1 class="font-display text-4xl text-primary">
                {{ $user->name }}
            </h1>
            <p class="text-sm text-muted max-w-lg leading-relaxed">
                Weekly mood check ins completed by this patient.
            </p>
        </div>
        @if ($moodReport->isEmpty())
            <div class="border-t border-border pt-8">
                <p class="text-muted">
                    This patient hasn't completed a weekly check in yet.
                </p>
            </div>
        @else
            <div class="border-t border-border pt-8 space-y-8">
                <section class="space-y-4">
                    <h2 class="font-display text-3xl text-primary">
                        Trends over time
                    </h2>
                    <div class="bg-surface border border-border rounded-lg p-6">
                        <canvas id="chart"></canvas>
                    </div>
                </section>
                @php
                    $latest = $moodReport->last();
                @endphp
                <section class="space-y-4">
                    <h2 class="font-display text-3xl text-primary">
                        Latest check in
                    </h2>
                    <div class="border border-border bg-surface rounded-lg p-6 space-y-5">
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <p class="text-sm text-muted">Mood</p>
                                <p class="text-2xl text-primary">
                                    {{ $latest->mood }}/10
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-muted">Anxiety</p>
                                <p class="text-2xl text-primary">
                                    {{ $latest->anxiety }}/10
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-muted">Stress</p>
                                <p class="text-2xl text-primary">
                                    {{ $latest->stress }}/10
                                </p>
                            </div>
                        </div>
                        @if ($latest->notes)
                            <div class="border-t border-border pt-5 space-y-2">
                                <h3 class="text-sm font-medium text-primary">
                                    Notes:
                                </h3>
                                <p class="text-primary leading-relaxed whitespace-pre-line">
                                    {{ $latest->notes }}
                                </p>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        @endif
    </section>
</x-layout>

@vite('resources/js/mood-chart.js')
