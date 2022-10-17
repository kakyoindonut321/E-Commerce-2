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
</div>


@foreach($product[0] as $a)
<div class="card m-2" style="width: 14rem;" >
  <img src="{{ URL::to('/image/placeholder.jpg') }}" class="card-img-top" alt="...">
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






@endsection