@extends('main')

@section('css')
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
@endsection

@section('content')
@if ($order->isEmpty() == 1)
    <h3 class="text-center text-danger">anda belum membuat order</h3>
@else
<table class="">
    <tr>
        <th>Product</th>
        <th>Price(IDR)</th>
        <th>Amount</th>
        <th>Image</th>
        <th>Total</th>
        <th>Date</th>
        <th>Payment</th>
        <th>Status</th>
    </tr>
    @foreach($order as $od)
        <tr>
            <td>{{ $od->product->name }}</td>
            <td>{{ $od->product->price }}</td>
            <td>1</td>
            <td class="border "><img style="height: 5rem; width: 5rem;" src="{{ asset('storage/' . $od->product->image) }}" ></td>
            <td>{{ $od->product->price }}</td>
            <td>8 December 1980</td>
            <td>E-Wallet-kelompok1</td>
            <td>{{ $od->status }}</td>
        </tr>   
    @endforeach
@endif

@endsection