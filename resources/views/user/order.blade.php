@extends('main')

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





@foreach($orders as $order)
<form action="/order/buy" id="orderForm" method="POST">@csrf</form>

<div class="product">
    <input type="hidden" name="order[]" value="{{ $order->id }}" form="orderForm">
    <div class="top-product">
        <input type="checkbox" name="table[]" value="{{ $order->product->id }}" id="checkbox" style="display: inline;" form="orderForm" onchange onpropertychange onkeyuponpaste oninput="change()">
        <h5 style="display: inline;">Toko {{ $order->product->user }}</h5>
    </div>
    <hr>
    <div class="product-table">
        <div class="pr1 inputs">
            <div class="img-product inputs" style="height: 200px;" >
                <img src="{{ asset('storage/' . $order->product->image) }}" alt="" width="180" style="margin-top: 10px; height: 180px; width: 180px;">
            </div>
            <div class="title-product inputs">
                <h6>{{ $order->product->name }}</h6>
            </div>
        </div>

        <div class="pr2 inputs">
            <div class="inputs">
                <p id="harga">{{ $order->product->price }}</p>
            </div>
            
            <div class="inputs">
                <div class="input-group inline-group">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary btn-minus">
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <input name="jumlah[]" type="number" min="1" max="{{ $order->product->stock }}" placeholder="1"  id="jumlah" form="orderForm" onchange onpropertychange onkeyuponpaste oninput="change()" >
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary btn-plus">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                </div>            
            </div>

            <div class="inputs total">
                <p id="total"></p>
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
<h1>anda belum menambahkan order</h1>
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
        const jumlah = document.querySelectorAll('#jumlah');
        const total = document.querySelectorAll('#total');
        const harga = document.querySelectorAll('#harga');
        const checkbox = document.querySelectorAll('#checkbox');
        const supertotal = document.getElementById('supertotal');
        const  totality = [];
        var very;
        var contain = document.querySelectorAll('.product');
        for (let i = 0; i < contain.length; i++) {
                // document.getElementById('dog').innerHTML = document.getElementById('jumlah').value;
                if (jumlah[i].value <= 50) {

                }
                total[i].innerHTML = harga[i].innerHTML * jumlah[i].value;
                // total[i].innerHTML += '.00';
            }      

        function change() {
            // console.log(contain.length);
            for (let i = 0; i < contain.length; i++) {
                // document.getElementById('dog').innerHTML = document.getElementById('jumlah').value;
                // if (jumlah[i].value <= 50) {
                //     console.log(jumlah[i].value);
                // }
                total[i].innerHTML = harga[i].innerHTML * jumlah[i].value;
                // total[i].innerHTML += '.00';

                // checkbox[i].addEventListener('change', (event) => {
                //     if (event.currentTarget.checked) {
                //         // if (totality.includes(total[i].innerHTML)) {
                //         //     console.log(totality.includes(total[i].innerHTML));
                //         //     return;
                //         // }
                //         // totality.push(total[i].innerHTML);
                //         console.log(checkbox[i]);
                //     } else {
                //         console.log(checkbox[i]);
                //         // supertotal.innerHTML -= totality;
                //         // const index = totality.indexOf(total[i].innerHTML)
                //         // totality.splice(index, 1);
                //         // console.log(totality);
                //     }
                // })
                if (checkbox[i].checked) {
                    very = i
                    console.log('damn');
                } else {
                    if (checkbox[i]) {

                    }
                    console.log('it');
                }
            }
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