@extends('main')

@section('css')
<link rel="stylesheet" href="{{ URL::to('/css/history.css') }}">
<style>
    /* table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td img {
      height: 5rem; 
      width: 5rem;
    }
    
    td, th{
      border: 1px solid #dedede;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dedede;
    }
    tr:nth-child(odd) {
      background-color: #eeeeee;
    }

    @media screen and (max-width: 700px) {
      table {
        width: 100%;
        font-size: 17px;
      }

      td img {
        height: 2rem;
        width: 2rem;
      }
    }

    @media screen and (max-width: 600px) {
      table {
        width: 100%;
        font-size: 10px;
      }

      td img {
        height: 2rem;
        width: 2rem;
      }
    }

    @media screen and (max-width: 400px) {
      table {
        width: 100%;
        font-size: 7px;
      }

      td img {
        height: 1rem;
        width: 1rem;
      }
    } */
    </style>
@endsection

@section('content')
@if ($history->isEmpty() == 1)
    <h3 class="text-center text-danger">anda belum membeli apapun</h3>
@else
{{-- <table class="border text-center">
    <tr>
        <th>Image</th>
        <th>Product</th>
        <th>Price(IDR)</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Payment</th>
    </tr>
    @foreach($history as $od)
        <tr>
            <td ><img style="" src="{{ asset('storage/' . $od->product->image) }}" ></td>
            <td>{{ $od->product->name }}</td>
            <td>{{ $od->product->price }}</td>
            <td>{{ $od->amount }}</td>
            <td>{{ $od->created_at }}</td>
            <td>{{ $od->payment }}</td>
        </tr>   
    @endforeach --}}
    @foreach($history as $his)
    <div class="history-card">
      <div class="top-date">
        <span class="pt-1">{{ $his->created_at }}</span>
      </div>
      <div class="table-card">
        <div class="hbox hbox-one">
          <div class="himg">
            <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="" width="100">
          </div>
          <div class="hprodata">
            <h4 class="htitle">{{ $his->product->name }}</h4>
            <h4 class="hharga">Rp{{ $his->price }}</h4>
          </div>

        </div>
        <div class="hbox hbox-two">
          <div class="htotalboxdata">
            <p>jumlah: <span>{{ $his->amount }}</span></p>
            <h4>total:</h4>
            <h6>{{ $his->total }}</h6>
          </div>
          <div class="status-box">
            <h5>status</h5>
            <h4
            style="color:@switch($his->status)@case('accepted') green @break @case('denied') red @break @default grey @endswitch ;">
            {{ $his->status }}  
          </h4>
          </div>
        </div>
      </div>
    </div>
    @endforeach
@endif

@endsection