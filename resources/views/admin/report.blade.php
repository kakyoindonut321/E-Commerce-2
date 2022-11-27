@extends('main')

@section('css')
    <link rel="stylesheet" href={{ URL::to('/css/report.css') }}>
@endsection

{{-- {{ dd($category) }} --}}

@section('content')
<div class="inp-rop">
    <a href="/input-product" class="a-input"><div class="input-produk text-center open-sauce-one-bold">input product</div></a>
</div>
<div class="linechart1" >
    <div class="line-chart">
        <canvas id="linechart"></canvas>
    </div>
</div>

<div class="d-flex">
    <div class="flex-item-rpt">
        <div class="userlist-box mx-auto mt-2">
            <h4 class="text-center">User List</h4>
            <div class="userlist">
                <ul>
                    @foreach ($users as $user)
                        <li><span>{{ $user->name }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="flex-item-rpt">
        <div class="">
            <canvas id="bar-chart" width="400" height="225"></canvas>
        </div>
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

        const ctx = document.getElementById('linechart');
        const linechart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: historyLabel,
                datasets: [{
                        label: 'Pembelian',
                        data: historyamount,
                        backgroundColor: "#7ED957",
                        borderColor: "#7ED957",
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

        // BAR
        const categore = {!! $category !!}
        let catlabel = Object.keys(categore.categoryname)
        let catamount = Object.values(categore.categoryname)
        // console.log(categore);

        const barc = document.getElementById("bar-chart");
        new Chart(barc, {
        type: 'bar',
        data: {
        labels: catlabel,
        datasets: [
            {
            label: "Banyaknya produk di kategori",
            backgroundColor: '#7ED957',
            data: catamount
            }
        ]
        },
        options: {
        legend: { display: false },
        // title: {
        //     display: true,
        //     text: 'Predicted world population (millions) in 2050'
        // }
        }
    });
        
    </script>
@endsection