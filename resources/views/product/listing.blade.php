@extends('main')

@section('content')

<div class="card m-2" style="width: 14rem;">
    <img src="{{ URL::to('/image/placeholder.jpg') }}" class="card-img-top" alt="...">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Nama</li>
      <li class="list-group-item">Harga Rp 00</li>
      <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link">test</a>
      <a href="#" class="card-link">test</a>
    </div>
</div>
@endsection