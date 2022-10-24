<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ URL::to('/css/style.css') }}" />
    <!-- Font Awesome Cdn Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="wrapper">
      <div class="logo-header">
        <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" alt="" srcset="" />
        <h1>E-Commerce</h1>
      </div>
      <div class="user-logo">
        <img src="{{ URL::to('/image/user.png') }}" alt="" srcset="">
        <h1>Login</h1>
      </div>
      <div class="not-member">
        New to E-commerce? <a href="/register"><b>Sign Up</b></a>
      </div>
      <form action="{{ route('login-user') }}" method="post">
        @if(Session::has('registered'))
          <p class="text-success">{{ Session::get('registered') }}</p>
        @endif
        @csrf
        <div>
          <input type="text" placeholder="Email" name="email" value="{{ old('email') }}"/>
          <p style="font-size: 12px; color: red;">@error('email') {{ $message }} @enderror</p>
        </div>
        <div>
          <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"/>
          <p style="font-size: 12px; color: red;">@error('password') {{ $message }} @enderror</p>
        </div>
        @if(Session::has('wrongAuth'))
        <p style="font-size: 12px; color: red;">{{ Session::get('wrongAuth') }}</p>
        @endif

        <p class="recover">
          <a href="#">Forgot Password ?</a>
        </p>
        <button type="submit">Login</button>
      </form>
    </div>
  </body>
</html>
