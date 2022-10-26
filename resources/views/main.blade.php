<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if(isset($title)) {{ $title }} @else {{ $title = 'page' }} @endif</title>
    {{-- css --}}
    @yield('css')
    {{-- fontawesome etc. --}}
    @include('partial.css')


</head>
<body>
    {{-- NAVBAR --}}
    @include('partial.navbar')
    {{-- END NAVBAR --}}

    {{-- BODY DALEM --}}
    <div class="home-section-sb">

        {{-- SIDEBAR --}}
        @include('partial.sidebar')
        {{-- END SIDEBAR --}}
        
        {{-- CONTENT --}}
        <div class="d-flex p-2 justify-content-center" style="flex-wrap: wrap;">
            @yield('content')
        </div>
        {{-- END CONTENT --}}

    </div>
    {{-- END BODY DALEM --}}
    <script src="{{ URL::to('/js/sidebar.js') }}"></script>
</body>
</html>