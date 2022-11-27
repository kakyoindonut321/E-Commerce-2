@props(['product'])
<a href="/product/{{ $product->id }}" class="text-decoration-none" >
    <div class="product-card card  m-2" id="card">
      <div class="img-product-card open-sauce-one">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-product-card" alt="{{ asset('storage/' . $product->image) }}" >
      </div>
      <div class="card-body">
        <p class="card-title @if (strlen($product->name) >= 20) font-12 @elseif (strlen($product->name) > 16) font-14 @endif text-dark text-uppercase open-sauce-one">@if(strlen($product -> name) > 25) {{ substr( $product -> name, 0,20) . '.....' }} @else {{ $product -> name }} @endif</p>
        <h5 class="card-text text-dark open-sauce-one-bold">Rp<span class="autoamount">{{ $product->price }}</span></h5>
        <p class="card-text text-dark open-sauce-one">Terjual: {{ $product->sold }}</p>
        @auth
        @if (auth()->user()->privilege == "admin")
        <div class="d-flex justify-content-evenly admin-btn-div open-sauce-one-bold">
          <form action="/product/{{ $product->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-lime text-light open-sauce-one-bold">delete</button>
          </form>
          
          <a href="/product/{{ $product->id }}/edit" class="btn bg-lime text-light open-sauce-one-bold text-bold">update</a>
        </div>
        @endif
        @endauth
      </div>
    </div>
  </a>