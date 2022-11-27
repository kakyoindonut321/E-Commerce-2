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
    <div class="flexbbb ui">
        <h3>UI & UX</h3>
        <div class="itemmos">
            <div class="profiler">
                <img class="profimg" src="{{ URL::to('/image/dev/febri.png') }}" alt="">
                <h5>Febri</h5>
            </div>
            <div class="profiler">
                <img class="profimg" src="{{ URL::to('/image/dev/raka.jpeg') }}" alt="">
                <h5>Raka</h5>
            </div>
        </div>
    </div>
    <div class="flexbbb frontend">
        <h3>FRONTEND</h3>
        <div class="itemmos">
            <div class="profiler">
                <img class="profimg" src="{{ URL::to('/image/dev/natan.png') }}" alt="">
                <h5>Natan</h5>
            </div>        
            <div class="profiler">
                <img class="profimg" src="{{ URL::to('/image/dev/taufik.png') }}" alt="">
                <h5>Taufik</h5>
            </div>
            <div class="profiler">
                <img class="profimg" src="{{ URL::to('/image/dev/rifki.png') }}" alt="">
                <h5>Rifki</h5>
            </div>    
        </div>
    </div>
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
<div>
    <h1 class="text-center bold">About Us</h1>
    <div class="paragraf text-center">
        <p>Ipsa incidunt aliquam optio modi commodi tenetur sed et. Iure quam sunt in qui doloribus consequatur numquam reiciendis. 
            Laborum minus nam velit asperiores sed sapiente. Ut rerum iure sit et dolorum velit qui. 
            Voluptatem voluptas voluptatibus et exercitationem sit laborum ab. Vero id suscipit aut facilis ex rerum. 
            At voluptas dolor id. Aut architecto inventore nisi. Laudantium dolores et quia rerum quidem quis.
        </p>
        <p>Fugiat incidunt consectetur culpa saepe neque. Vero facilis aliquid sed aspernatur sequi consectetur officia. 
            Aliquid sit ipsam et magnam. Corrupti amet atque itaque id. Adipisci provident eum fugiat eaque omnis ea. 
            Perferendis omnis vel consequatur nisi aut. Omnis beatae accusamus quis perferendis sed nisi. 
            Esse sint sunt alias alias. Illo earum nam molestiae ab. Aperiam eum dolores rem optio explicabo neque provident. 
            Placeat reprehenderit velit ut voluptatem occaecati est iusto. Quae consequatur qui rerum in voluptas omnis. 
            Dolor distinctio officiis qui. Tempora minus labore et et quia aut. Similique pariatur debitis beatae et dolores quibusdam.
        </p>
    </div>
</div>

@endsection

@section('js') 

@endsection