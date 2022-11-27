@extends('main')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('/css/profile.css') }}">

    <style>
        #file-profile {
           display: none;
        }
        .fa-edit:hover {
            font-size: 35px;
            color: lightgrey;
            transition: all 0.2s ease;
        }
    </style>
@endsection


@error('name') {{ session()->now('message-error', $message) }} @enderror 

@section('content')
{{-- {{ dd(auth()->id()); }} --}}
<div class="container">
    <form action="/profile" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-0 pt-5">
                    <div class="row z-depth-3">
                        <div class="col-sm-4 bg-lime rounded-left user-profile">
                            <div class="card-block text-center text-white box-image">
                                {{-- <img class="mt-5 user-image mx-"auto src="@avatar(auth()->user()->profile_image)" alt="@avatar(auth()->user()->profile_image)" width="200"> --}}
                                <div class="mt-5 user-image mx-auto" style="background-image: url(@avatar(auth()->user()->profile_image))"></div>
                                <div class="user-info">
                                    <h2 class="font-weight-bold mt-4 user-h2 user-title">{{ auth()->user()->name }}</h2>
                                    <p class="font-weight-bold mt-4 user-pp ">Ganti profile picture</p>
                                </div>
                                <label for="file-profile" class="image-edit the-f-input"><i class='bx bxs-camera'></i></label>
                                <input type="file" name="imgProfile" id="file-profile" class="the-f-input">

                            </div>
                        </div> 

                        <div class="col-sm-8 bg-white rounded-right">
                            <h3 class="mt-3 text-center">Information</h3>
                            <hr class="badge-primary mt-0 w-100">
                            <div class="row">
                                <div class="user-detail">
                                    <label for="Name">Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}">
                                    <div class="user-name"></div>
                                        <label for="Email">Email</label>
                                        <input type="disable" name="email" placeholder="{{ auth()->user()->email }}" disabled>
                                        <div class="password">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="password" disabled>
                                        {{-- <a href="" class="text-info">Change password</a> --}}
                                    </div>   
                            <div class="submit">
                                <button type="submit" class="bg-lime">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
</div>


@endsection

@section('js')
<script>
        const profileInfo = document.querySelector('.user-profile');
        const boxName = document.querySelector('.user-name');
        const imgInp = document.getElementById("file-profile")
        const imgPrev = document.querySelector(".user-image")
        const nameTitle = document.querySelector('.user-title');
        const toggleLabel = document.querySelector(".image-edit")
        var widthout = window.innerWidth;


        const matchIcon = window.matchMedia("(max-width: 575px)");
        matchIcon.addEventListener('change', changeInput);
        console.log(widthout);

        if (widthout < 575) {
            console.log('less');
            toggleLabel.classList.add("open");
        } else {
            console.log('more');
            toggleLabel.classList.remove("open");
        }

        function changeInput() {
            toggleLabel.classList.toggle("open");
        }

        
        if (nameTitle.innerText.length > 8) {
            nameTitle.style.fontSize = "20px";
        }
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgPrev.style.backgroundImage = `url(${URL.createObjectURL(file)})`
            }
        }
</script>
@endsection
