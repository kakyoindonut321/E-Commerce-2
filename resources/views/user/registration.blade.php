<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ URL::to('/css/register.css') }}" />
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
        <h1>Sign Up</h1>
      </div>
      <form action="{{ route('register-user') }}" method="post">
        @if(Session::has('sus'))
          <h1>{{ Session::get('sus') }}</h1>
        @endif
        @if(Session::has('deez'))
        <h1>{{ Session::get('deez') }}</h1>
        @endif
        @csrf
        <div>
          <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}"/>
          <p style="font-size: 12px; color: red;">@error('name') {{ $message }} @enderror</p>
        </div>
        <div>
          <input type="text" name="email" placeholder="Email Address" value="{{ old('email') }}"/>
          <p style="font-size: 12px; color: red;">@error('email') {{ $message }} @enderror</p>
        </div>
        <div>
          <input type="password" name="password" placeholder="Password" value="{{ old('password') }}"/>
          <p style="font-size: 12px; color: red;">@error('password') {{ $message }} @enderror</p>
        </div>
        <div>
          <select id="select" name="privilege">
            <option value="user">User</option>
            <option value="seller">Penjual</option>
          </select>
        </div>

        <div class="not-member">
          Already Signed up? <a href="/login"><b>Sign Up</b></a>
        </div>

        <button type="submit">Sign Up</button>
      </form>


    </div>
  </body>
</html>
