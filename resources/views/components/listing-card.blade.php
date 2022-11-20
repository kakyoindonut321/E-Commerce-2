@props(['product'])
<a href="/product/{{ $product->id }}" class="text-decoration-none" >
    <div class="product-card card  m-2" id="card">
      <div class="img-product-card">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-product-card" alt="{{ asset('storage/' . $product->image) }}" >
      </div>
      <div class="card-body">
        <p class="card-title text-dark">@if(strlen($product -> name) > 25) {{ substr( $product -> name, 0,20) . '.....' }} @else {{ $product -> name }} @endif</p>
        <h5 class="card-text text-danger">@if(strlen($product->price) > 8) Rp{{ substr( $product->price, 0,8) . '..' }} @else Rp{{ $product->price }} @endif</h5>
        <p class="card-text text-dark">Terjual: {{ $product->sold }}</p>
        @auth
        @if (auth()->user()->privilege == "admin")
        <div class="d-flex justify-content-evenly admin-btn-div">
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