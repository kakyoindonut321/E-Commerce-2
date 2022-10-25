@extends('main')

@section('css')
    <link rel="stylesheet" href={{ URL::to('/css/detail.css') }}>
@endsection

@section('content')
<div class = "carddd-wrapper">
        <div class = "carddd">
          <!-- card left -->
          <div class = "product-imgs ">
            <div class = " img-display">
              <div class = "img-showcase">
                <img class="detail-img" src = "{{ URL::to('/image/produk/' . $product -> image) }}" alt = "{{ $product -> image }}">
              </div>
           </div>
           <!-- card right -->
          <div class = "product-content">
            <h2 class = "product-title">{{ $product->name }}</h2>
            <div class = "product-price">
              <h4 class = "new-price">Price: <span>${{ $product->price }}</span></h4>
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
              <button type = "button" class = "btn">
                Add to Cart <i class = "fas fa-shopping-cart"></i>
              </button>
              <a type = "button" href="/buy" class = "btn">BUY</a>
            </div>
      
            <div class = "social-links">
              <p>Share At: </p>
              <a href = "#">
                <i class = "fab fa-facebook-f"></i>
              </a>
              <a href = "#">
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