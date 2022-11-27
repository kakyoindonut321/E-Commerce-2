@extends('main')

@section('css')
<link rel="stylesheet" href="{{ URL::to('/css/history.css') }}">
@endsection


@section('content')
@if ($history->isEmpty() == 1)
    <h3 class="text-center text-danger">anda belum membeli apapun</h3>
@else
    @foreach($history as $his)
    <div class="history-card">
      <div class="top-date">
          @if (auth()->user()->privilege == "admin")
            <span class="pt-1 text-primary">{{ $his->user->name }}</span>
          @endif
        <span class="pt-1">{{ \Carbon\Carbon::parse($his->created_at)->format('l d, m, Y h:i A')}}</span>
      </div>
      <div class="table-card">
        <div class="hbox hbox-one">
          <div class="himg">
            <img src="{{ asset('storage/' . $his->product->image) }}" alt="" width="100">
          </div>
          <div class="hprodata">
            <h4 class="htitle">{{ $his->product->name }}</h4>
            <h4 class="hharga">Rp <span class="autoamount">{{ $his->price }}</span></h4>
          </div>

        </div>
        <div class="hbox hbox-two">
          <div class="htotalboxdata">
            <p>jumlah: <span>{{ $his->amount }}</span></p>
            <h4>total:</h4>
            <h6>Rp <span class="autoamount">{{ $his->total }}</span></h6>
          </div>
          <div class="status-box">
            <h5>status</h5>
            <h4
            style="color:@switch($his->status)@case('accepted') green @break @case('declined') red @break @default grey @endswitch ;">
            {{ $his->status }}  
          </h4>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @include('pagination.default', ['paginator' => $history])

@endif

@endsection