@extends('main')


@section('css')
    <link rel="stylesheet" href="{{ URL::to('/css/order.css') }}">
@endsection

@section('content')

@unless (count($orders) == 0)
@foreach ($orders as $od)
<div class="order-card">
    <div class="item-card-order">
        <p class="user-order">User</p>
        <h3>{{ $od->user->name }}</h3>
    </div>
    <div class="item-card-order">
        <p class="product-order">Product</p>
        <h3>{{ $od->product->name }}</h3>
    </div>
    <div class="item-card-order action-order">
        <div class="my-auto ">
            <div class="button-list-gen-order">
                <form class="d-flex justify-content-around" action="/order/{{ $od->id }}" method="POST">
                    @csrf
                    <button type="submit" name="aproval" value="declined" class="button-gen-order deny-button bg-danger">DECLINE</button>
                    <button type="submit" name="aproval" value="accepted" class="button-gen-order accept-button bg-primary">ACCEPT</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@else 
<h3 class="text-center text-danger">Pesanan kosong</h3>
@endunless

@endsection

@section('js')
    
@endsection