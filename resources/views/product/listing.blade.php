@extends('main')

@section('content')

{{-- variable --}}
<div class="d-none">
  {{ $list = count($product) }}
  @if ( empty($getPage) == 1)
    {{ $getPage = 0 }}
  @endif
</div>


{{-- SLIDE CAROUSEL --}}
@if ($getPage  == 0)
<div id="slider" class="carousel slide border mx-5 w-75 border" data-bs-ride="carousel">
  <div class="carousel-inner ">
      <div class="carousel-item bg-dark active">
          <img src="{{ URL::to('/image/iklan/iklan.png') }}" class="d-block w-100" alt="1">
      </div>
      <div class="carousel-item bg-dark">
          <img src="{{ URL::to('/image/iklan/iklan2.jpg') }}" class="d-block w-100" alt="2">
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
@endif
{{-- END CAROUSEL--}}

{{-- CARD --}}
@foreach($product[$getPage] as $a)
<a href="/product/{{ $a->id }}" class="text-decoration-none" >
  <div class="product-card card  m-2" style="width: 14rem; height: 24rem;" id="card">
    <div >
      <img style="height: 14rem;" src="{{ URL::to('/image/produk/' . $a -> image) }}" class="card-img-top" alt="<?php $a -> image?>" >
    </div>
    <div class="card-body">
      <p class="card-title text-dark">{{ $a -> name }}</p>
      <h5 class="card-text text-danger">harga: ${{ $a -> price }}</h5>
      <p class="card-text text-dark">stock: {{ $a -> stock }}</p>
      {{-- HANYA BISA DILIHAT ADMIN --}}
      <div class="d-flex justify-content-evenly m-1">
        <a href="#" class="btn bg-lime text-light">delete</a>
        <a href="#" class="btn bg-lime text-light">update</a>
      </div>
      {{-- END HANYA BISA DILIHAT ADMIN --}}
    </div>
  </div>
</a>
@endforeach
{{-- END CARD --}}

{{-- pagination --}}
<div class="" style="padding-left: 20%; padding-right: 20%;">
  <div class="mx-auto p-0 rounded  bg-lime" style="">
    @for($page = 0; $page < $list; $page++)
    <a href="?page={{ $page }}" style="display:inline-block;" class="btn @if($page == $getPage) bg-darklime @endif">{{ $page}} </a>
    @endfor
  </div>  
</div>
@endsection




{{-- nggak kepake --}}
{{-- <div class="card m-2" style="width: 14rem;" >
  <img src="{{ URL::to('/image/produk/' . $a -> image) }}" class="card-img-top" alt="">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $a -> name }}</li>
    <li class="list-group-item">harga: ${{ $a -> price }}</li>
    <li class="list-group-item">stock: {{ $a -> stock }}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="btn bg-lime text-light">delete</a>
    <a href="#" class="btn bg-lime text-light">update</a>
  </div>
</div> --}}