@extends('layout/main')

@section('title','MINDER')


@section('container')
<!-- center 1 content -->
<div class="row p-0 m-0">
  <div class="col-sm-6 pl-0" > 
    <img id="bassist-img" src="assets/bassist 1.png" style="width:100%"alt="">
  </div>
  <div class="col-sm-6" style="text-align:center;padding-top:100px" >
    <h1 style="color: #2EA8D1">SIGN UP</h1><br>
    <a href="{{ url('/signup-musician') }}">
      <button class="btn-blue" style="border-radius: 40px;">I AM A MUSICIAN</button><br><br>
    </a>
    <a href="{{ url('/signup-band') }}">
      <button class="btn-blue" style="border-radius: 40px;">I HAVE A BAND</button><br><br>
    </a>
    <p>Already have an account? <span><a href="{{ url('/signin') }}">Sign in now</a></span></p>
</div>
</div>
<!--  end center 1 content -->
@endsection
