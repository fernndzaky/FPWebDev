@extends('layout/main')

@section('title','MINDER')


@section('container')
<!-- center 1 content -->
<div class="row m-0">
  <div class="col-sm-6 pl-0" > 
    <img src="assets/bassist 1.png" style="width:100%"alt="">
  </div>
  <div class="col-sm-6" style="text-align:center;padding-top:100px" >
    <h1 style="color: #2EA8D1">SIGN IN</h1><br>
    <a href="{{ url('/signin-musician') }}">
      <button class="btn-blue" style="border-radius: 40px;">I AM A MUSICIAN</button><br><br>
    </a>
    <a href="{{ url('/signin-band') }}">
      <button class="btn-blue" style="border-radius: 40px;">I HAVE A BAND</button><br><br>
    </a>
    <p>Don't have an account? <span><a href="{{ url('/signup') }}">Create new account now</a></span></p>
  </div>
</div>
<!--  end center 1 content -->
@endsection