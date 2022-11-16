@extends('main') @section('css') {{--
  <link rel="stylesheet" href={{ URL::to( '/css/detail.css') }}> --}}
  <style>
      .jumlah {
          /* width: 50px; */
          align-items: center;
          /* padding-left: 20px; */
          text-align: center;
          border: solid;
          border-width: 1px;
          border-color: grey;
      }

      .col-detail-action {
      }

      .action-detail {
          width: 360px;
          padding: 10px;
          border: 1px solid lightgrey; 
          background-color: white;
          border-radius: 10px;
      }

      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
      
      .container-detail {
          justify-content: space-between;
          /* width: 1000px; height: 500px; borde r: 1px solid red; margin: auto; */
          display: grid;
          grid-template-columns: 33% 33% 33%;
          grid-template-rows: auto;
      }
      
      .col-detail {
          width: 100%;
          height: 90%;
          /* border: 1px solid #7ED957;  */
          padding: 15px;
      }
      
      .col-detail img {
        width: 100%;
      }
      
      .button-detail {
          color: rgb(255, 255, 255);
          margin-top: 10px;
          display: inline-block;
          background-color: #7ED957;
          border-radius: 40px;
          border: 0px;
          cursor: pointer;
          width: 100%;
      }
      
      .button-detail:hover {
          background-color: #66b346;
      }
      
      .button-detail:active {
          background-color: #7ED957;
      }
      
      .inline-group {
          max-width: 10rem;
          padding: .4rem;
          /* border: 1px solid black; */
          /* display: flex;
          justify-content: center; */
      }
      
      .inline-group .form-control {
          text-align: center;
      }

      .stocker {
        margin-left: 5px;
        margin-top: auto;
        margin-bottom: auto;
      }
      
      .form-control[type="number"]::-webkit-inner-spin-button,
      .form-control[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
      
      .fa-minus-sold,
      .fa-plus-sold {
          color: lightgrey;
      }
      
      @media only screen and (max-width: 900px) {
          .col-detail img {
              width: 200px;
              justify-content: center;
          }
          .container-detail {
              display: flex;
              flex-wrap: wrap;
          }
          .col-detail {
              width: 100%;
          }

          .inline-group { 
            justify-content: left;
          }
      }

  </style>
  @endsection {{-- @if (session()->has('message-error')) @endif --}} @error('product_id') {{ session()->now('message-error', 'Barang telah dimasukan ke keranjang') }} @enderror @section('content')
  
  <div class="container-detail">
      <div class="col-detail">
          <img src="{{ asset('storage/' . $product->image) }}" alt="" srcset="">
  
      </div>
      <div class="col-detail">
          <div>
            <h1>{{ $product->name }}</h1>
            <hr class="w-25">
          </div>
          <h3>price: Rp<span id="harga">{{ $product->price }}</span></h3>
          <hr>
          <div class="description">
            <p>{{ $product->description }}</p>
          </div>
      </div>

      <div class="col-detail-action mx-auto">
        <div class="action-detail">
          <h3>Total: <span id="total"></span></h3>
          <div class="d-flex justify-content-start">
            <div class="input-group inline-group" style="@if ($product->stock == 0) pointer-events: none; @endif flex-wrap: nowrap;">
              <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary btn-minus" style="@if ($product->stock == 0) border: 1px solid lightgrey @endif">
                    <i class="fa fa-minus @if ($product->stock == 0) fa-minus-sold @endif"></i>
                  </button>
              </div>
              <input name="jumlah[]" type="number" min="1" value="1" max="{{ $product->stock }}" @unless ($product->stock == 0) id="jumlah" @endunless form="buy" class="jumlah" placeholder="1" onchange onpropertychange onkeyuponpaste oninput="change()" style="@if ($product->stock == 0) color: lightgrey; border: 1px solid lightgrey; @endif" @disabled($product->stock == 0)>
              <div class="input-group-append">
                  <button class="btn btn-outline-secondary btn-plus" style="@if ($product->stock == 0) border: 1px solid lightgrey @endif">
                    <i class="fa fa-plus @if ($product->stock == 0) fa-plus-sold @endif"></i>
                  </button>
              </div>
           </div>
           <p class="stocker" style="display:inline-block;">stock: <span id="stock">{{ $product->stock }}</span></p>
          </div>

          <form action="{{ route('create-order') }}" method="post">
              @csrf
              <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}"> @auth
              <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}"> @endauth
              <button type="submit" class="button-detail">Add to order <i class = "fas fa-shopping-cart"></i></button> {{-- <button type="submit" class="btn">Add to Order<i class = "fas fa-shopping-cart"></i></button> --}}
          </form>
  
          <form action="{{ route('buy') }}" method="post" id="buy">
              @csrf
              <input type="hidden" id="produk" name="product_id" value="{{ $product->id }}"> @auth
              <input type="hidden" id="user" name="user" value="{{ auth()->user()->id }}"> @endauth {{-- <button type="submit" class="btn">BUY</button> --}}
              <button type="submit" class="button-detail">BUY</button>
          </form>
        </div>
      </div>
  
  </div>
  
  
  @endsection @section('js')
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