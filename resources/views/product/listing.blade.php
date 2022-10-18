@extends('main')

@section('content')

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
    <li class="list-group-item">{{ $a -> price }}</li>
    <li class="list-group-item">{{ $a -> stock }}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">test</a>
    <a href="#" class="card-link">test</a>
  </div>
</div>
@endforeach


{{-- pagination --}}
<div class="mx-5" >
  <div class="mx-auto container bg-lime p-1 rounded my-5" style="">
    @for($page = 0; $page < $list; $page++)
    <a href="?page={{ $page }}" style="display:inline;" class="btn">{{ $page + 1}}</a>
    @endfor
  </div>  
</div>

@endsection