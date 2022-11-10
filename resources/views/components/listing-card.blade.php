@props(['product'])
<a href="/product/{{ $product->id }}" class="text-decoration-none" >
    <div class="product-card card  m-2" style="width: 14rem; height: 24rem;" id="card">
      <div style="height: 14rem;">
        <img style="height: 14rem; " src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ asset('storage/' . $product->image) }}" >
      </div>
      <div class="card-body">
        <p class="card-title text-dark">@if(strlen($product -> name) > 25) {{ substr( $product -> name, 0,20) . '.....' }} @else {{ $product -> name }} @endif</p>
        <h5 class="card-text text-danger">harga: Rp{{ $product -> price }}</h5>
        <p class="card-text text-dark">stock: {{ $product -> stock }}</p>
        @auth
        @if (auth()->user()->privilege == "admin")
        <div class="d-flex justify-content-evenly m-1">
          <form action="/product/{{ $product->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-lime text-light">delete</button>
          </form>
          
          <a href="/product/{{ $product->id }}/edit" class="btn bg-lime text-light">update</a>
        </div>
        @endif
        @endauth
      </div>
    </div>
  </a>