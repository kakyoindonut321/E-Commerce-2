@extends('main')

@section('content')

{{-- {{ dd($product) }} --}}

{{-- variable --}}
<div class="d-none">
  {{ $list = count($products) }}
  @if ( empty($getPage) == 1)
    {{ $getPage = 0 }}
  @endif
</div>


{{-- SLIDE CAROUSEL --}}
@if ($products->currentPage() == 1 and request('search') == '')
  <x-ads :type="['type' => 1]" />
@endif
{{-- END CAROUSEL--}}

@unless(count($products) == 0)

<div class="d-flex justify-content-center" style="flex-wrap: wrap;">
  @foreach($products as $product)
    <x-listing-card :product="$product"/>
  @endforeach
@else 
<h4>produk tidak ditemukan</h4>
@endunless

</div>

@include('pagination.default', ['paginator' => $products])


@endsection





















{{-- nggak dipake --}}

{{-- pagination --}}
{{-- <div class="d-flex p-5" >
  <div class="mx-auto p-0 rounded  bg-lime" style="">
    @for($page = 0; $page < $list; $page++)
    <a href="?page={{ $page }}" style="display:inline-block;" class="btn @if($page == $getPage) bg-darklime @endif">{{ $page }} </a>
    @endfor
  </div>  
</div> --}}
{{-- end pagination --}}

{{-- <form action="{{ route('search') }}"><input type="text" placeholder="search" name="search"><button type="submit">submit</button></form> --}}
