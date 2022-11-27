@extends('auth.main')

@section('form')
<div class="wrapper">
  <div class="logo-header">
    <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" alt="" srcset="" />
    <h1 class="text-uppercase">LightStore</h1>
  </div>
  <div class="user-logo">
    <img src="{{ URL::to('/image/user.png') }}" alt="" srcset="">
    <h1  class="text-uppercase">Sign Up</h1>
  </div>
  <form action="{{ route('register-user') }}" method="post">
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
    {{-- <div>
      <select id="select" name="privilege">
        <option value="user">User</option>
        <option value="seller">Penjual</option>
      </select>
    </div> --}}

    <div class="not-member">
      Already Signed up? <a href="/login"><b>Login</b></a>
    </div>

    <button type="submit" class="open-sauce-one-bold">Sign Up</button>
  </form>


</div>

@endsection