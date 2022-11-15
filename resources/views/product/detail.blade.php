@extends('main')

@section('css')
    {{-- <link rel="stylesheet" href={{ URL::to('/css/detail.css') }}> --}}
    <style>
            .container-detail {
            justify-content: space-between;
              /* width: 1000px; height: 500px; borde r: 1px solid red; margin: auto; */
                display: grid;
                grid-template-columns: 33% 30% 33%;
                grid-template-rows: auto;
           }
           .col {
                 /* width: 100px;  */
                 height: 90%;
                 /* overflow-y: scroll;  */
                 border: 0px solid #7ED957; 
                 padding: 15px;
                 /* margin: 10px; */
           } 
           
           .button-detail {
                color: rgb(255, 255, 255);
                margin: 5px;
                display: inline-block;
                background-color: #7ED957;
                border-radius: 40px;
                border: 0px;
                cursor: pointer;
                width: 100%;

           }

           .col p {
            overflow: hidden;
           }

           button:hover {
            background-color:rgb(13, 196, 13);
           }

           button:active {
            background-color:#7ED957;
           }

           .col img {
            width: 100%;
           }

           @media only screen and (max-width: 900px) {
          .col img {
                width: 200px;
            }
                .container-detail {
                    display: flex;
                    flex-wrap: wrap;
                }

                .col {
                    width: 100%;
                }
            }
            /* button {
                border-radius: 30px;
                border: 0;
                font-size: 1.8rem;
                font-weight: 10;
                margin: 1rem ;
                padding: 2rem 3rem;
                text-transform: uppercase;
                white-space: nowrap;



            } */
    </style>
@endsection

{{-- @if (session()->has('message-error'))
    
@endif --}}

@error('product_id') {{ session()->now('message-error', 'Barang telah dimasukan ke keranjang') }} @enderror


@section('content')

<div class="container-detail">
  <div class="col">
      <img src="{{ asset('storage/' . $product->image) }}" alt="" srcset="">

  </div>
  <div class="col"> 
      <h1>{{ $product->name }}</h1>
      <h2>price: Rp{{ $product->price }}</h2>
      <h2>stock: {{ $product->stock }}</h2>
      <h3>Description</h3>
      <p>{{ $product->description }}</p>
  </div>
  <div class="col">
      <div class="css-1q2nbwe" data-testid="quantityOrder">
      {{-- <h3>Total: 3493498</h3> --}}

      <form action="{{ route('create-order') }}" method="post">
        @csrf
        <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}">
        @auth
        <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}">
        @endauth
        <button type="submit" class="button-detail" >Add to order <i class = "fas fa-shopping-cart"></i></button>               
        {{-- <button type="submit" class = "btn">Add to Order<i class = "fas fa-shopping-cart"></i></button> --}}
      </form>
      
      <form action="{{ route('buy') }}" method="post">
        @csrf
        <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}">
        @auth
        <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}">
        @endauth
        {{-- <button type="submit" class = "btn">BUY</button> --}}
        <button type="submit" class="button-detail">BUY</button>                
      </form>
  </div>
  
</div>


@endsection

@section('ignore')
<div class = "carddd-wrapper">
  {{-- <p style="font-size: 12px; color: red;">@error('product_id') {{ $key }} @enderror</p> --}}
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


{{-- 
KODENYA TARO DIBAWAH SINI 
| 
v
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>css  model 1</title>
        <style >
           .container {
            justify-content: space-between;
              /* width: 1000px; height: 500px; borde r: 1px solid red; margin: auto; */
                display: grid;
                grid-template-columns: 33% 30% 33%;
                grid-template-rows: auto;
           }
           .col {
                 /* width: 100px;  */
                 height: 90%;
                 overflow-y: scroll; 
                 border: 0px solid #7ED957; 
                 padding: 15px;
                 /* margin: 10px; */
           } 
           
           button {
                color: rgb(255, 255, 255);
                margin: 5px;
                display: inline-block;
                background-color: #7ED957;
                border-radius: 40px;
                border: 0px;
                cursor: pointer;
                width: 100%;

           }

           .col p {
            overflow: hidden;
           }

           button:hover {
            background-color:rgb(13, 196, 13);
           }

           button:active {
            background-color:#7ED957;
           }

           .col img {
            width: 100%;
           }

           @media only screen and (max-width: 900px) {
          .col img {
                width: 200px;
            }
                .container {
                    display: flex;
                    flex-wrap: wrap;
                }

                .col {
                    width: 100%;
                }
            }
            /* button {
                border-radius: 30px;
                border: 0;
                font-size: 1.8rem;
                font-weight: 10;
                margin: 1rem ;
                padding: 2rem 3rem;
                text-transform: uppercase;
                white-space: nowrap;



            } */
        </style>
    </head>
    <body>
         
        <div class="container">
            <div class="col">
                <img src="bola.jfif" alt="" srcset="">

            </div>
            <div class="col"> 
                <h1>BOLA ortus</h1>
                <h2>price: Rp50.000
                    stock:110
                </h2>
                <h3>Deskripsi</h3>
                <p>
                    Kondisi: Baru
                    Berat Satuan: 1 kg
                    Kategori: Bola Sepak
                    Etalase: BOLA SEPAK
                    Bola sepak original ORTUS fifa world cup qatar 2022 official match ball
                    
                   
                    
                </p>
            </div>
            <div class="col">
                <div class="css-1q2nbwe" data-testid="quantityOrder">
                    <!-- <div class="css-h82t6w-unf-quantity-editor">
                        <button aria-label="Kurangi 1" class="css-199ul1b" disabled="" tabindex="-1">
                            <svg class="unf-icon" viewBox="0 0 24 24" width="18px" height="18px" fill="var(--NN300, #BFC9D9)" style="display: inline-block; vertical-align: middle;">
                                <path d="M20 12.75H4a.75.75 0 110-1.5h16a.75.75 0 110 1.5z"></path></svg></button>
                                <input id="qty-editor-atc" aria-valuenow="1" aria-valuemin="1" aria-valuemax="99949" class="css-197wjuk-unf-quantity-editor__input" data-unify="QuantityEditor" role="spinbutton" type="text" value="1">
                                <button aria-label="Tambah 1" class="css-199ul1b" tabindex="-1">
                                    <svg class="unf-icon" viewBox="0 0 24 24" width="18px" height="18px" fill="var(--GN500, #00AA5B)" style="display: inline-block; vertical-align: middle;">
                                        <path d="M20 11.25h-7.25V4a.75.75 0 10-1.5 0v7.25H4a.75.75 0 100 1.5h7.25V20a.75.75 0 101.5 0v-7.25H20a.75.75 0 100-1.5z"></path></svg></button></div>
                                        <label class="css-1ngblhr" for="qty-editor-atc">Total</label>
                                        <p data-unify="Typography" data-testid="stock-label" class="css-1hhh2ha-unf-heading  -->

                <h3>Total: 3493498</h3>
                <button onclick="doSomething()" >Add to order</button>               
                <button onclick="doSomething()" >BUY</button>                
            </div>
            
        </div>
        


    </body>

</html>







--}}