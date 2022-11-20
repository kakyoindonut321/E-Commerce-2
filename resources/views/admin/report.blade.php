@extends('main')

@section('content')
<a href="/input-product">input product</a>

<div class="linechart1" style="margin-left: 200px; margin-right: 200px;" >
    <div class="line-chart">
        <canvas id="myChart" ></canvas>
    </div>
</div>

{{ dd($testtotal); }}
@endsection

@section('js')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
    integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- line chart --}}
    <script>
        let dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                        label: 'Expense',
                        data: [12, 19, 3, 5, 2, 3, 69],
                        backgroundColor: "#de0a26",
                        borderColor: "#de0a26",
                        borderWidth: 3
                    },
                    {
                        label: 'Income',
                        data: [16, 14, 25, 7, 6, 1, 57],
                        backgroundColor: "#03ac13",
                        borderColor: "#03ac13",
                        borderWidth: 3
                    }
                ]
            },
            responsive: true,
            maintainAspectRatio: false,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        
    </script>
@endsection