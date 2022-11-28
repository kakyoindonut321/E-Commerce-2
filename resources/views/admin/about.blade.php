@extends('main')


@section('css')
    <link rel="stylesheet" href={{ URL::to('/css/about.css') }}>
@endsection

@section('content')
<div class="manager">
    <h3>PROJECT MANAGER</h3>
    <div class="profiler">
        <img class="profimg" src="{{ URL::to('/image/dev/hannan.jpeg') }}" alt="">
        <h5>Hannan</h5>
    </div>
</div>
<div class="theflex">
    <div class="doubble">
        <div class="flexbbb ui">
            <h3>UI & UX</h3>
            <div class="itemmos">
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/febri.png') }}" alt="">
                    <h5>Febri</h5>
                </div>
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/raka.jpg') }}" alt="">
                    <h5>Raka</h5>
                </div>
            </div>
        </div>
        <div class="flexbbb frontend">
            <h3>FRONTEND</h3>
            <div class="itemmos">
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/natan.jpg') }}" alt="">
                    <h5>Natan</h5>
                </div>        
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/taufik.png') }}" alt="">
                    <h5>Taufik</h5>
                </div>
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/ripki.jpg') }}" alt="">
                    <h5>Rifki</h5>
                </div>    
            </div>
        </div>
    </div>
    <div class="doubble">
        <div class="flexbbb backend">
            <h3>BACKEND</h3>
            <div class="itemmos">
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/navis.png') }}" alt="">
                    <h5>Navis</h5>
                </div>    
            </div>
        </div>
        <div class="flexbbb tester">
            <h3>TESTER</h3>
            <div class="itemmos">
                <div class="profiler">
                    <img class="profimg" src="{{ URL::to('/image/dev/fari.jpeg') }}" alt="">
                    <h5>Fari</h5>
                </div>   
            </div>
        </div>
    </div>
</div>
<div>
    <h1 class="text-center bold">About Us</h1>
    <div class="paragraf text-center">
        <p>
            Ini adalah Web E-Commerce yang kami kembangkan dan pembuatan website ini masih terbilang sederhana terutama
            dalam segi tampilan dan segi keamanan
        </p>
        <p>
            Dalam perancangan website ini,semoga konten yang didalamnya bisa 
            bermanfaat untuk pengguna yang memakai layanan website kami. Perancangan website ini masih harus diriset sungguh-sungguh
            mengenai target yang dibidik serta apa yang ingin ditonjollkan dalam desain website tersebut.
        </p>
    </div>
</div>

@endsection

@section('js') 

@endsection