@extends('main')

@section('content')

{{-- SLIDE CAROUSEL --}}
          <div id="slider" class="carousel slide border mx-5 w-75" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item bg-dark active">
                    <img src="{{ URL::to('/image/iklan/iklan.png') }}" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item bg-dark">
                    <img src="{{ URL::to('/image/iklan/iklan2.png') }}" class="d-block w-100" alt="2">
                </div>
                <div class="carousel-item bg-dark">
                    <img src="{{ URL::to('/image/iklan/iklan3.png') }}" class="d-block w-100" alt="3">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                  </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
          </div>
          {{-- END CAROUSEL--}}

{{-- @foreach($product as $p)
<h1>1</h1>
@foreach($p as $g)
<h4>{{ $g }}</h4>
@endforeach
@endforeach --}}


{{-- variable --}}
<div class="d-none">
  {{ $list = count($product) }}
  @if ( empty($getPage) == 1)
    {{ $getPage = 0 }}
  @endif
</div>



@foreach($product[$getPage] as $a)
<div class="card m-2" style="width: 14rem;" >
  <img src="{{ URL::to('/image/produk/' . $a -> image) }}" class="card-img-top" alt="<?php $a -> image?>">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $a -> name }}</li>
    <li class="list-group-item">harga: ${{ $a -> price }}</li>
    <li class="list-group-item">stock: {{ $a -> stock }}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="btn bg-primary text-light">delete</a>
    <a href="#" class="btn bg-primary text-light">update</a>
  </div>
</div>
@endforeach


{{-- pagination --}}
<div class="border" style="padding-left: 20%; padding-right: 20%;">
  <div class="mx-auto container bg-lime p-1 rounded my-5" style="">
    @for($page = 0; $page < $list; $page++)
    <a href="?page={{ $page }}" style="display:inline;" class="btn">{{ $page}}</a>
    @endfor
  </div>  
</div>

@endsection