@extends('main')

@error('category') {{ session()->now('message-error', $message) }} @enderror
@error('cover_image') {{ session()->now('message-error', $message) }} @enderror
@error('stock') {{ session()->now('message-error', $message) }} @enderror
@error('price') {{ session()->now('message-error', $message) }} @enderror

@section('css')
<link rel="stylesheet" href={{ URL::to('/css/input-product.css') }}>
@endsection

@section('content')
    <div class="product-page" class="">
        <div class="form-i">
            <h3>Update Product</h3>
            <form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @METHOD('put')
                <input type="text" name="name" placeholder="Product Name" value="{{ $product->name }}" required>
                <input type="text" name="description" placeholder="Description Product" value="{{ $product->description }}" required>
                <input type="number" name="stock" placeholder="stock" value="{{ $product->stock }}" required>
                <div class="form-row">
                    <input type="number" name="price" placeholder="Price" value="{{ $product->price }}" required>
                    <select id="category" name="category_id" placeholder="category">
                        <option disabled selected hidden>Category</option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="fileinp-wrapper">
                    <input type="file" accept="image/png, image/jpeg" name="cover_image" id="imgInp">
                    <img src="" id="imgWrappper" width="200" alt="">
                </div>
                <button type="submit" ondblclick="this.disabled=true;"><b>Submit</b></button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const imgInp = document.getElementById("imgInp")
        const imgWrappper = document.getElementById("imgWrappper")
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgWrappper.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection