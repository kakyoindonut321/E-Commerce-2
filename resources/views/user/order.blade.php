@extends('main')

@section('content')
<table class="table border bg-light">
    <tr>
        <th>id</th>
        <th>product</th>
        <th>status</th>
    </tr>
    @foreach($order as $od)
    <tr>
        <td>{{ $od->id }}</td>
        {{-- <td>{{ $od->user->name }}</td> --}}
        <td class="border "><img style="height: 5rem; width: 5rem;" src="{{ URL::to('/image/produk/' . $od->product->image) }}" ></td>
        <td>{{ $od->status }}</td>
    </tr>   
    @endforeach
    @endsection