@extends('components.client-layout')
@section('main-client-content')
    @php
        $charts = [
            ['id' => 'ffIntake', 'title' => 'New Intake from 2015', 'sub' => 'Freshman admission per year', 'data' => $intake,
                'type' => 'column', 'color' => '#1d5191', 'head' => ['Year', 'New students']],
            ['id' => 'ffEnrolment', 'title' => 'Total Enrolment from 2015', 'sub' => 'All enrolled students per year', 'data' => $enrolment,
                'type' => 'column', 'color' => '#c25f05', 'head' => ['Year', 'Students']],
            ['id' => 'ffCountries', 'title' => 'Foreign Students Intakes', 'sub' => 'Students by country', 'data' => $countries,
                'type' => 'row', 'color' => '#1d5191', 'head' => ['Country', 'Students']],
            ['id' => 'ffFaculties', 'title' => 'Foreign Students Faculty Wise', 'sub' => 'Total enrolment by faculty', 'data' => $faculties,
                'type' => 'row', 'color' => '#c25f05', 'head' => ['Faculty', 'Students']],
        ];
    @endphp

    <section class="fu-ff">
        <div class="container">
            <p class="fu-ff-intro">The Facts &amp; Figures show the admission and enrollment of The Future University.</p>

            <div class="fu-ff-stats">
                @foreach ($stats as $stat)
                    <div class="fu-ff-stat"><b>{{ $stat['value'] }}</b><span>{{ $stat['label'] }}</span></div>
                @endforeach
            </div>

            <div class="fu-ff-grid">
                @foreach ($charts as $chart)
                    <figure class="fu-ff-card">
                        <figcaption>
                            <h2>{{ $chart['title'] }}</h2>
                            <p>{{ $chart['sub'] }}</p>
                        </figcaption>
                        <div class="fu-ff-chart {{ $chart['type'] === 'row' ? 'fu-ff-row' : 'fu-ff-column' }}" style="--rows: {{ count($chart['data']) }}">
                            <canvas id="{{ $chart['id'] }}" role="img"
                                aria-label="{{ $chart['title'] }}: {{ collect($chart['data'])->map(fn ($v, $k) => $k . ' ' . $v)->implode(', ') }}"></canvas>
                        </div>
                        <details class="fu-ff-table">
                            <summary>Show the numbers</summary>
                            <table>
                                <thead><tr><th>{{ $chart['head'][0] }}</th><th>{{ $chart['head'][1] }}</th></tr></thead>
                                <tbody>
                                    @foreach ($chart['data'] as $label => $value)
                                        <tr><td>{{ $label }}</td><td>{{ number_format($value) }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </details>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (!window.Chart) return;
            var charts = @json($charts);
            var ink = '#5b6475', grid = '#eef1f5';
            var font = { family: "Ubuntu, 'Ubuntu Fallback', Arial, sans-serif", size: 12 };

            // Writes each value at the end of its bar, so the numbers can be read without hovering.
            var valueLabels = {
                id: 'valueLabels',
                afterDatasetsDraw: function (chart) {
                    var ctx = chart.ctx, horizontal = chart.options.indexAxis === 'y';
                    ctx.save();
                    ctx.font = '500 12px ' + font.family;
                    ctx.fillStyle = '#1f2430';
                    chart.getDatasetMeta(0).data.forEach(function (bar, i) {
                        var text = Number(chart.data.datasets[0].data[i]).toLocaleString('en');
                        if (horizontal) {
                            ctx.textAlign = 'left'; ctx.textBaseline = 'middle';
                            ctx.fillText(text, bar.x + 6, bar.y);
                        } else {
                            ctx.textAlign = 'center'; ctx.textBaseline = 'bottom';
                            ctx.fillText(text, bar.x, bar.y - 4);
                        }
                    });
                    ctx.restore();
                }
            };

            charts.forEach(function (c) {
                var horizontal = c.type === 'row';
                var values = Object.values(c.data);
                var max = Math.max.apply(null, values);
                new Chart(document.getElementById(c.id), {
                    type: 'bar',
                    plugins: [valueLabels],
                    data: {
                        labels: Object.keys(c.data),
                        datasets: [{
                            label: c.head[1],
                            data: values,
                            backgroundColor: c.color,
                            hoverBackgroundColor: c.color + 'cc',
                            borderRadius: 4,
                            borderSkipped: 'start',
                            maxBarThickness: horizontal ? 22 : 46,
                            categoryPercentage: horizontal ? 0.75 : 0.7
                        }]
                    },
                    options: {
                        indexAxis: horizontal ? 'y' : 'x',
                        maintainAspectRatio: false,
                        layout: { padding: horizontal ? { right: 44 } : { top: 22 } },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#1f2430', padding: 10, cornerRadius: 8, displayColors: false,
                                titleFont: font, bodyFont: font,
                                callbacks: { label: function (item) { return item.formattedValue + ' students'; } }
                            }
                        },
                        scales: {
                            x: horizontal
                                ? { beginAtZero: true, suggestedMax: max * 1.08, grid: { color: grid }, border: { display: false }, ticks: { color: ink, font: font, maxTicksLimit: 5 } }
                                : { grid: { display: false }, border: { color: '#d7dce4' }, ticks: { color: ink, font: font } },
                            y: horizontal
                                ? { grid: { display: false }, border: { color: '#d7dce4' }, ticks: { color: '#1f2430', font: font, autoSkip: false } }
                                : { beginAtZero: true, grid: { color: grid }, border: { display: false }, ticks: { color: ink, font: font, maxTicksLimit: 6 } }
                        }
                    }
                });
            });
        });
    </script>
@endsection
