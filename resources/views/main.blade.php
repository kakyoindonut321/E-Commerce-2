<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nanti dinamain</title>

    {{-- BOOSTRAP DARI PROJECT SENDIRI --}}
    <link rel="stylesheet" href={{ URL::to('/css/bootstrap.css') }}>
    {{-- FONTAWESOME ONLINE KARENA GK BISA --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- BOOSTRAP JS JUGA SORRY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    {{-- NAVBAR --}}
    @include('partial.navbar')
    {{-- END NAVBAR --}}

    {{-- BODY DALEM --}}
    <div class="d-flex">

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
    <script src="{{ URL::to('/js/additional.js') }}"></script>
</body>
</html>