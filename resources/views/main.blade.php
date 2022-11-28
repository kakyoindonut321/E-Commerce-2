<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if(isset($title)) {{ $title }} @else {{ $title = 'page' }} @endif</title>
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <div class="home-section-sb pb-1">

        {{-- SIDEBAR --}}
        @include('partial.sidebar')
        {{-- END SIDEBAR --}}
        
        {{-- CONTENT --}}
        <div class=" p-2 " >
            @yield('content')
        </div>
        {{-- END CONTENT --}}

    </div>
    {{-- END BODY DALEM --}}

    {{-- FOOTER --}}
    @include('partial.footer')
    {{-- END FOOTER --}}

    <x-message />
    @include('partial.js')
    @yield('js')

</body>
</html>