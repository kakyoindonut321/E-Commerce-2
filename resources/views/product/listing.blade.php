@extends('main')

@section('content')

{{-- {{ dd($product) }} --}}

{{-- variable --}}
<div class="d-none">
  {{ $list = count($product) }}
  @if ( empty($getPage) == 1)
    {{ $getPage = 0 }}
  @endif
</div>


{{-- SLIDE CAROUSEL --}}
@if ($product->currentPage() == 1 and request('search') == '')
<div style="height: 360px">
  <div id="slider" class="carousel slide border mx-auto w-50 border" data-bs-ride="carousel">
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

</div>
@endif
{{-- END CAROUSEL--}}

@unless(count($product) == 0)

<div class="d-flex justify-content-center" style="flex-wrap: wrap;">
  {{-- CARD --}}
  @foreach($product as $a)
  <a href="/product/{{ $a->id }}" class="text-decoration-none" >
    <div class="product-card card  m-2" style="width: 14rem; height: 24rem;" id="card">
      <div style="height: 14rem;">
        <img style="height: 14rem; " src="{{ asset('storage/' . $a->image) }}" class="card-img-top" alt="{{ asset('storage/' . $a->image) }}" >
      </div>
      <div class="card-body">
        <p class="card-title text-dark">@if(strlen($a -> name) > 25) {{ substr( $a -> name, 0,20) . '.....' }} @else {{ $a -> name }} @endif</p>
        <h5 class="card-text text-danger">harga: Rp{{ $a -> price }}</h5>
        <p class="card-text text-dark">stock: {{ $a -> stock }}</p>
        @auth
        @if (auth()->user()->privilege == "admin")
        <div class="d-flex justify-content-evenly m-1">
          <form action="/product/{{ $a->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn bg-lime text-light">delete</button>
          </form>
          
          <a href="/product/{{ $a->id }}/edit" class="btn bg-lime text-light">update</a>
        </div>
        @endif
        @endauth
      </div>
    </div>
  </a>
  @endforeach
  {{-- END CARD --}}
@else 
<h4>produk tidak ditemukan</h4>
@endunless

</div>

{{-- <form action="{{ route('search') }}"><input type="text" placeholder="search" name="search"><button type="submit">submit</button></form> --}}
@include('pagination.default', ['paginator' => $product])


@endsection



{{-- pagination --}}
{{-- <div class="d-flex p-5" >
  <div class="mx-auto p-0 rounded  bg-lime" style="">
    @for($page = 0; $page < $list; $page++)
    <a href="?page={{ $page }}" style="display:inline-block;" class="btn @if($page == $getPage) bg-darklime @endif">{{ $page }} </a>
    @endfor
  </div>  
</div> --}}
{{-- end pagination --}}