@extends('main')

@section('css')
<link rel="stylesheet" href={{ URL::to('/css/order.css') }}>
@endsection

@section('content')
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


<form action="">
  <div class="product">
      <div class="top-product">
          <input type="checkbox" style="display: inline;">
          <h5 style="display: inline;">penjual</h5>
      </div>
      <hr>
      <div class="product-table">
          <div class="pr1">
              <div class="img-product">
                  <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="" width="180" style="margin-bottom: 5%;">
              </div>
              <div class="title-product">
                  <h6>Nama Produk</h6>
              </div>
          </div>

          <div class="pr2">
              <div>
                  <p>100.000</p>
              </div>
              <div>
                <input type="number" min="1" name="" id="">
              </div>
              <div>
                  <p>
                      200.000
                  </p>
              </div>
              <div>
                  <p>Action</p>
              </div>
          </div>
      </div>
  </div>

  <footer>
      <div class="checkout">
          <button type="submit">CHECKOUT</button>
      </div>
  </footer>
</form>
@endsection