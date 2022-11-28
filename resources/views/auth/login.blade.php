@extends('auth.main')

@section('form')
<div class="wrapper">
  <div class="logo-header">
    <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" alt="" srcset="" />
    <h1 class="">Green Bay</h1>
  </div>
  <div class="user-logo">
    <img src="{{ URL::to('/image/user.png') }}" alt="" srcset="">
    <h1  class="text-uppercase">Login</h1>
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

    {{-- <p class="recover">
      <a href="#">Forgot Password ?</a>
    </p> --}}
    <button type="submit" class="open-sauce-one-bold">Login</button>
  </form>
</div>
@endsection