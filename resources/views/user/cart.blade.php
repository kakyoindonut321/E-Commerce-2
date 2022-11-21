@extends('main')

@error('table') {{ session()->now('message-error', 'Pilih produk yang ingin dibeli') }} @enderror

@section('css')
<link rel="stylesheet" href={{ URL::to('/css/cart.css') }}>
<style>
    .inline-group {
        max-width: 15rem;
        padding: .2rem;
    }

    .inline-group .form-control {
        text-align: center;
    }

    .form-control[type="number"]::-webkit-inner-spin-button,
    .form-control[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .fa-minus-sold, .fa-plus-sold {
        color: lightgrey;
    }
</style>
@endsection

@section('content')
@unless(count($carts) == 0)
<div class="header-table">
  <div class="header1" style="text-align: left; padding-left: 10px;">
      <p>Produk</p>
  </div>
  <div>
      <p>Harga</p>
  </div>
  <div>
      <p>Jumlah</p>
  </div>
  <div>
      <p>
          Total Harga
      </p>
  </div>
  <div>
      <p>Action</p>
  </div>
</div>



{{-- <p style="color: red;">@error('table') Pilih produk yg ingin dibeli @enderror</p> --}}

@foreach($carts as $cart)
<form action="/cart/buy" id="cartForm" method="POST">@csrf</form>

<div class="product @unless ($cart->product->stock == 0) product-list @endunless" data-idproduct="{{ $cart->id }}" style="@if ($cart->product->stock == 0) color: lightgrey; @endif">
    <input type="hidden" name="cart[]" value="{{ $cart->id }}" form="cartForm">

    <div class="top-product">
        @unless ($cart->product->stock == 0) <input type="checkbox" name="table[]" value="{{ $cart->id }}" id="checkbox" style="display: inline;" form="cartForm" onchange onpropertychange onkeyuponpaste oninput="change()">
        <h5 style="display: inline;"> {{ $cart->product->name }}</h5>
        <span style=" float: right; padding-right: 10px;">Tersisa {{ $cart->product->stock }} barang</p>
        @else
        <h6 style="display: inline;">-</h6>
        <h5 style="display: inline;"> {{ $cart->product->name }}</h5>
        <span style="color: red; float: right; padding-right: 5px;">produk sudah habis</p>
        @endunless
    </div>
    <hr style="color: #808080"> 
    <div class="product-table">
        <div class="pr1 inputs">
            <div class="img-product " >
                <img class="img-cart @if ($cart->product->stock == 0) bcart-op @endif" src="{{ asset('storage/' . $cart->product->image) }}" alt="" width="180">
            </div>  
            <div class="title-product ">
                <h6 class="desc-cart">@if(strlen($cart->product->description)> 200) {{ substr( $cart->product->description, 0,200) . '...' }} @else {{ $cart->product->description }} @endif</h6>
            </div>
        </div>

        <div class="pr2 inputs">
            <div class="inputs">
                <span style="display: none" @unless ($cart->product->stock == 0) id="harga" @endunless>{{ $cart->product->price }}</span>
                <p>Rp<span class="autoamount">{{ $cart->product->price }}</span></p>
            </div>
            
            <div class="inputs">
                <div class="input-group inline-group" style="@if ($cart->product->stock == 0) pointer-events: none; @endif flex-wrap: nowrap;">
                    <div class="input-group-prepend"> 
                      <button class="btn btn-outline-secondary btn-minus" style="@if ($cart->product->stock == 0) bcart: 1px solid lightgrey @endif">
                        <i class="fa fa-minus @if ($cart->product->stock == 0) fa-minus-sold @endif"></i>
                      </button>
                    </div>
                    <input name="jumlah[]" type="number" min="1" value="1" max="{{ $cart->product->stock }}"  
                    @unless ($cart->product->stock == 0) id="jumlah" @endunless 
                    form="cartForm" class="jumlah"
                    placeholder="1"
                    onchange onpropertychange onkeyuponpaste oninput="change()" 
                    style="@if ($cart->product->stock == 0) color: lightgrey; bcart: 1px solid lightgrey; @endif"
                    @disabled($cart->product->stock == 0)>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary btn-plus" style="@if ($cart->product->stock == 0) bcart: 1px solid lightgrey @endif">
                        <i class="fa fa-plus @if ($cart->product->stock == 0) fa-plus-sold @endif"></i>
                      </button>
                    </div>
                </div>    
            </div>

            <div class="inputs total">
                <p>Rp<span  @unless ($cart->product->stock == 0) id="total" @endunless class="autoamount"></span></p>
            </div>
            <div class="inputs">
                <form action="/cart/{{ $cart->id }}" id="cartDelete" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="del-btn-cart" style="margin-top: 45%;">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@include('pagination.default', ['paginator' => $carts])

<br><br><br>
@else 
<h3 class="text-center text-danger">Keranjang Kosong</h3>
@endunless
<footer>
    <div class="checkout">
        <h3 >TOTAL: <span id="supertotal"></span></h3>
        <button type="submit" form="cartForm">CHECKOUT</button>
    </div>
</footer>

@endsection


@section('js')
    <script>
        const supertotal = document.getElementById('supertotal');
        const contain = document.querySelectorAll('.product-list');
        let checked = []

        setSuperTotal()
        change()

        contain.forEach(elm => {
            let inpCheckbox = elm.querySelector("#checkbox")
            let productId = elm.dataset.idproduct

            inpCheckbox.addEventListener("change", e => {
                inpCheckbox.checked && checked.push(productId)
                if(!inpCheckbox.checked){
                    checked = checked.filter(e => e != productId)
                }

                setSuperTotal()
            })
        })

        function setSuperTotal() {
            let totalAll = 0;
            checked.forEach(productId => {
                let productEl = document.querySelector(`.product[data-idproduct='${productId}']`)
                const valTotalProduct = parseInt(productEl.querySelector("#total").textContent)

                totalAll += valTotalProduct
            })
            supertotal.innerHTML = totalAll;
        }


        function change() {
            contain.forEach(elm => {
                const total = elm.querySelector('#total');
                const harga = elm.querySelector('#harga');
                const jumlah = elm.querySelector('#jumlah');
                
                total.innerHTML = parseFloat(harga.innerHTML) * parseFloat(jumlah.value);
            })
            
            setSuperTotal();
            // new AutoNumeric.multiple('.total', option);

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
@endsection