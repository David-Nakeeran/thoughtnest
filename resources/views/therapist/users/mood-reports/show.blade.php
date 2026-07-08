<script>
    var moodReport = {{ Js::from($moodReport) }};
</script>
<x-layout>
    @if ($moodReport->isEmpty())
        <p>User hasn't completed a mood report yet.</p>
    @else
        <canvas id="chart">
        </canvas>
    @endif
</x-layout>

@vite('resources/js/mood-chart.js')
