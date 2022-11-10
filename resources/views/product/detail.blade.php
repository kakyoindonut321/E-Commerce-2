@extends('main')

@section('css')
    <link rel="stylesheet" href={{ URL::to('/css/detail.css') }}>
@endsection

@section('content')
<div class = "carddd-wrapper">
  <p style="font-size: 12px; color: red;">@error('product_id') {{ $message }} @enderror</p>
        <div class = "carddd">
          <!-- card left -->
          <div class = "product-imgs ">
            <div class = " img-display">
              <div class = "img-showcase">
                <img class="detail-img" src = "{{ asset('storage/' . $product->image) }}" alt = "{{ asset('storage/' . $product->image) }}">
              </div>
           </div>
           <!-- card right -->
          <div class = "product-content">
            <h2 class = "product-title">{{ $product->name }}</h2>
            <div class = "product-price">
              <h4 class = "new-price">Price: <span>${{ $product->price }}</span></h4>
              <h5 class = "old-price">stock: <span>{{ $product->stock }}</span></h5>
            </div>
            
            <div class = "product-detail">
              <h3>about this item: </h3>
              <p>{{ $product->description }}</p>
              {{-- <ul>
                <li>Color: <span>Black</span></li>
                <li>Available: <span>in stock</span></li>
                <li>Category: <span>Shoes</span></li>
                <li>Shipping Area: <span>All over the world</span></li>
                <li>Shipping Fee: <span>Free</span></li>
              </ul> --}}
            </div>
      
            <div class = "purchase-info">
              <form action="{{ route('create-order') }}" method="post" style="display: inline-block;">
                @csrf
                <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}">
                @auth
                <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}">
                @endauth
                <button type="submit" class = "btn">Add to Order<i class = "fas fa-shopping-cart"></i></button>
              </form>
              
              <form action="{{ route('buy') }}" method="post" style="display: inline-block;">
                @csrf
                <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}">
                @auth
                <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}">
                @endauth
                <button type="submit" class = "btn">BUY</button>
              </form>
            </div>
      
            <div class = "social-links">
              <p>Share At: </p>
              <a href = "https://www.facbook.com">
                <i class = "fab fa-facebook-f"></i>
              </a>
              <a href = "https:www.twitter.com">
                <i class = "fab fa-twitter"></i>
              </a>
              <a href = "#">
                <i class = "fab fa-instagram"></i>
              </a>
              <a href = "#">
                <i class = "fab fa-whatsapp"></i>
              </a>
              <a href = "#">
                <i class = "fab fa-pinterest"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

@endsection


{{-- https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg --}}