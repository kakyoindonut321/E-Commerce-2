@extends('main') 

@section('css') 
  <link rel="stylesheet" href={{ URL::to( '/css/detail.css') }}>
  @auth
    @if (auth()->user()->privilege == "admin")
    <style>
      .button-detail {
        background-color: lightgrey;
        pointer-events: none;

      }
    </style>
    @endif
  @endauth

  @if ($product->stock == 0) 
  <style>
    .buy {
      background-color: lightgrey; 
      pointer-events: none;
    }
  </style>
  @endif 
@endsection 
{{-- @if (session()->has('message-error')) @endif --}} 

@error('product_id') {{ session()->now('message-error', 'Barang telah dimasukan ke keranjang') }} @enderror 

@section('content')
  <div class="container-detail">
      <div class="col-detail">
        <div class="img-div">
          <img src="{{ asset('storage/' . $product->image) }}" alt="" srcset="">
        </div>
      </div>
      <div class="col-detail">
          <div class="">
            <h1 class="">{{ $product->name }}</h1>
            {{-- <hr class=""> --}}
          </div>
          <h3>Harga: Rp<span id="harga" class="autoamount">{{ $product->price }}</span></h3>
          <h5>Terjual: <span>{{ $product->sold }}</span></h5>
          <hr>
          <div class="description">
            <p>{{ $product->description }}</p>
          </div>
      </div>

      <div class="col-detail-action mx-auto">
        <div class="action-detail">
          <h3>Total: <span id="total" class="autoamount"></span></h3>
          <div class="d-flex justify-content-start">
            <div class="input-group inline-group" style="@if ($product->stock == 0) pointer-events: none; @endif flex-wrap: nowrap;">
              <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary btn-minus" style="@if ($product->stock == 0) border: 1px solid lightgrey @endif">
                    <i class="fa fa-minus @if ($product->stock == 0) fa-minus-sold @endif"></i>
                  </button>
              </div>
              <input name="jumlah" type="number" min="1" value="1" max="{{ $product->stock }}" @unless ($product->stock == 0) id="jumlah" @endunless form="buy" class="jumlah" placeholder="1" onchange onpropertychange onkeyuponpaste oninput="change()" style="@if ($product->stock == 0) color: lightgrey; border: 1px solid lightgrey; @endif" @disabled($product->stock == 0)>
              <div class="input-group-append">
                  <button class="btn btn-outline-secondary btn-plus" style="@if ($product->stock == 0) border: 1px solid lightgrey @endif">
                    <i class="fa fa-plus @if ($product->stock == 0) fa-plus-sold @endif"></i>
                  </button>
              </div>
           </div>
           <p class="stocker" style="display:inline-block;">stock: <span id="stock">{{ $product->stock }}</span></p>
          </div>
          @if ($product->stock == 0)
            <span style="color: red">produk sudah habis</span> 
          @endif
          @auth
          @if (auth()->user()->privilege == "admin")
            <form action="{{ route('create-cart') }}" method="post">
              @csrf
              <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}"> @auth
              <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}"> @endauth
              <button type="submit" class="button-detail" disabled>Add to Cart <i class = "fas fa-shopping-cart"></i></button> {{-- <button type="submit" class="btn">Add to Order<i class = "fas fa-shopping-cart"></i></button> --}}
            </form>

            <form action="{{ route('buy') }}" method="post" id="buy">
                @csrf
                <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}"> @auth
                <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}"> @endauth {{-- <button type="submit" class="btn">BUY</button> --}}
                <button type="submit" class="button-detail" disabled>BUY</button>
            </form>
            @endauth
          @else
            <form action="{{ route('create-cart') }}" method="post">
              @csrf
              <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}"> @auth
              <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}"> @endauth
              <button type="submit" class="button-detail">Add to Cart <i class = "fas fa-shopping-cart"></i></button> {{-- <button type="submit" class="btn">Add to Order<i class = "fas fa-shopping-cart"></i></button> --}}
            </form>

            <form action="{{ route('buy') }}" method="post" id="buy">
                @csrf
                <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}"> @auth
                <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}"> @endauth {{-- <button type="submit" class="btn">BUY</button> --}}
                <button type="submit" class="button-detail buy" @disabled($product->stock == 0)>BUY</button>
            </form>
          @endif
 

          <div class = "social-links">
            <p>Share At: </p>
            <a href = "https://www.facebook.com">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "https://www.twitter.com">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "https://www.instagram.com">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "https://www.whatsapp.com">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "https://www.pinterest.com">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
  
  </div>
  @endsection 
  
  
  @section('js')
  <script>
      const supertotal = document.getElementById('supertotal');
      const contain = document.querySelectorAll('.product-list');
      // let checked = []
  
      // setSuperTotal()
      change()
  
      // contain.forEach(elm => {
      //     let inpCheckbox = elm.querySelector("#checkbox")
      //     let productId = elm.dataset.idproduct
  
      //     inpCheckbox.addEventListener("change", e => {
      //         inpCheckbox.checked && checked.push(productId)
      //         if(!inpCheckbox.checked){
      //             checked = checked.filter(e => e != productId)
      //         }
  
      //         setSuperTotal()
      //     })
      // })
  
      // function setSuperTotal() {
      //     let totalAll = 0;
      //     checked.forEach(productId => {
      //         let productEl = document.querySelector(`.product[data-idproduct='${productId}']`)
      //         const valTotalProduct = parseInt(productEl.querySelector("#total").textContent)
  
      //         totalAll += valTotalProduct
      //     })
      //     supertotal.innerHTML = totalAll
      // }
  
  
      function change() {
          // contain.forEach(elm => {
          const total = document.querySelector('#total');
          const harga = document.querySelector('#harga');
          const jumlah = document.querySelector('#jumlah');
          console.log(total.innerHTML);
          total.innerHTML = parseFloat(harga.innerHTML) * parseFloat(jumlah.value)
              // })
  
          // setSuperTotal()
  
      }
      $('.btn-plus, .btn-minus').on('click', function(e) {
          const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
          const input = $(e.target).closest('.input-group').find('input');
          if (input.is('input')) {
              input[0][isNegative ? 'stepDown' : 'stepUp']()
              change()
          }
      })
  </script>
  @endsection {{-- https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg --}}