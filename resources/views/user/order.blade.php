@extends('main')

@error('table') {{ session()->now('message-error', 'Pilih produk yang ingin dibeli') }} @enderror

@section('css')
<link rel="stylesheet" href={{ URL::to('/css/order.css') }}>
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
@unless(count($orders) == 0)
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

@foreach($orders as $order)
<form action="/order/buy" id="orderForm" method="POST">@csrf</form>

<div class="product @unless ($order->product->stock == 0) product-list @endunless" data-idproduct="{{ $order->id }}" style="@if ($order->product->stock == 0) color: lightgrey; @endif">
    <input type="hidden" name="order[]" value="{{ $order->id }}" form="orderForm">

    <div class="top-product">
        @unless ($order->product->stock == 0) <input type="checkbox" name="table[]" value="{{ $order->id }}" id="checkbox" style="display: inline;" form="orderForm" onchange onpropertychange onkeyuponpaste oninput="change()">
        <h5 style="display: inline;"> {{ $order->product->name }}</h5>
        <span style=" float: right; padding-right: 10px;">Tersisa {{ $order->product->stock }} barang</p>
        @else
        <h6 style="display: inline;">-</h6>
        <h5 style="display: inline;"> {{ $order->product->name }}</h5>
        <span style="color: red; float: right; padding-right: 5px;">produk sudah habis</p>
        @endunless
    </div>
    <hr style="color: #808080"> 
    <div class="product-table">
        <div class="pr1 inputs">
            <div class="img-product inputs" style="height: 200px;" >
                <img class="img-order @if ($order->product->stock == 0) border-op @endif" src="{{ asset('storage/' . $order->product->image) }}" alt="" width="180">
            </div>  
            <div class="title-product inputs">
                <h6>{{ $order->product->description }}</h6>
            </div>
        </div>

        <div class="pr2 inputs">
            <div class="inputs">
                <p @unless ($order->product->stock == 0) id="harga" @endunless>{{ $order->product->price }}</p>
            </div>
            
            <div class="inputs">
                <div class="input-group inline-group" style="@if ($order->product->stock == 0) pointer-events: none; @endif flex-wrap: nowrap;">
                    <div class="input-group-prepend"> 
                      <button class="btn btn-outline-secondary btn-minus" style="@if ($order->product->stock == 0) border: 1px solid lightgrey @endif">
                        <i class="fa fa-minus @if ($order->product->stock == 0) fa-minus-sold @endif"></i>
                      </button>
                    </div>
                    <input name="jumlah[]" type="number" min="1" value="1" max="{{ $order->product->stock }}"  
                    @unless ($order->product->stock == 0) id="jumlah" @endunless 
                    form="orderForm" class="jumlah"
                    placeholder="1"
                    onchange onpropertychange onkeyuponpaste oninput="change()" 
                    style="@if ($order->product->stock == 0) color: lightgrey; border: 1px solid lightgrey; @endif"
                    @disabled($order->product->stock == 0)>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary btn-plus" style="@if ($order->product->stock == 0) border: 1px solid lightgrey @endif">
                        <i class="fa fa-plus @if ($order->product->stock == 0) fa-plus-sold @endif"></i>
                      </button>
                    </div>
                </div>    
            </div>

            <div class="inputs total">
                <p @unless ($order->product->stock == 0) id="total" @endunless></p>
            </div>
            <div class="inputs">
                <form action="/order/{{ $order->id }}" id="orderDelete" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn bg-lime text-light" style="margin-top: 45%;">delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<br><br><br>
@else 
<h3 class="text-center text-danger">anda belum membuat order</h3>
@endunless
<footer>
    <div class="checkout">
        <h3 >TOTAL: <span id="supertotal"></span></h3>
        <button type="submit" form="orderForm">CHECKOUT</button>
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
            supertotal.innerHTML = totalAll
        }


        function change() {
            contain.forEach(elm => {
                const total = elm.querySelector('#total');
                const harga = elm.querySelector('#harga');
                const jumlah = elm.querySelector('#jumlah');
                
                total.innerHTML = parseFloat(harga.innerHTML) * parseFloat(jumlah.value)
            })
            
            setSuperTotal()

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