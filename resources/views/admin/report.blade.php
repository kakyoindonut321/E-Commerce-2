@extends('main')

@section('content')
<a href="/input-product">input product</a>

<div class="linechart1" style="margin-left: 200px; margin-right: 200px;" >
    <div class="line-chart">
        <canvas id="myChart" ></canvas>
    </div>
</div>

<div class="d-flex border">
    <div>
        <div class="border">
            <ol>
                @foreach ($users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ol>
        </div>
    </div>
    <div>

    </div>
</div>

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
        const history = {!! $history !!}
        let historyLabel = Object.keys(history.history)
        let historyamount = Object.values(history.history)

        console.log();

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: historyLabel,
                datasets: [{
                        label: 'Pembelian',
                        data: historyamount,
                        backgroundColor: "green",
                        borderColor: "green",
                        borderWidth: 3
                    },
                    // {
                    //     label: 'Income',
                    //     data: dataWeekIncome,
                    //     backgroundColor: "#03ac13",
                    //     borderColor: "#03ac13",
                    //     borderWidth: 3
                    // }
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