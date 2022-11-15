@extends('main')

@section('css')
<link rel="stylesheet" href={{ URL::to('/css/input-product.css') }}>
@endsection

@section('content')
    <div class="product-page" class="">
        <div class="form-i">
            <h3>Input Product</h3>
            <form action="{{ route('create-product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user" value="{{ auth()->user()->name }}">
                <input type="text" name="name" placeholder="Product Name" required>
                <input type="text" name="description" placeholder="Description Product" required>
                <input type="number" name="stock" placeholder="stock" required>
                <div class="form-row">
                    <input type="number" name="price" placeholder="Price" required>
                    <select id="category" name="category" placeholder="category">
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
                <button type="submit"><b>Submit</b></button>
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