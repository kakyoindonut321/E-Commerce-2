@extends('main')
@section('content')
    <h1>{{ auth()->user()->name }}</h1>
    @if(in_array(auth()->user()->privilege, array('admin', 'seller')))
    <a href="/input-product">input product</a>
    @endif
@endsection