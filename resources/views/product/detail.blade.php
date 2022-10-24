@extends('main')

@section('css')
    <link rel="stylesheet" href={{ URL::to('/css/detail.css') }}>
@endsection

@section('content')
<div class = "card-wrapper">
        <div class = "card">
          <!-- card left -->
          <div class = "product-imgs">
            <div class = "img-display">
              <div class = "img-showcase">
                <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt = "shoe image" width="500">
              </div>
           </div>
           <!-- card right -->
          <div class = "product-content">
            <h2 class = "product-title">nike shoes</h2>
            <div class = "product-price">
              <p class = "new-price">Price: <span>$249.00</span></p>
            </div>
            
            <div class = "product-detail">
              <h2>about this item: </h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
              <ul>
                <li>Color: <span>Black</span></li>
                <li>Available: <span>in stock</span></li>
                <li>Category: <span>Shoes</span></li>
                <li>Shipping Area: <span>All over the world</span></li>
                <li>Shipping Fee: <span>Free</span></li>
              </ul>
            </div>
      
            <div class = "purchase-info">
              <input type = "number" min = "0" value = "1">
              <button type = "button" class = "btn">
                Add to Cart <i class = "fas fa-shopping-cart"></i>
              </button>
              <button type = "button" class = "btn">Compare</button>
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