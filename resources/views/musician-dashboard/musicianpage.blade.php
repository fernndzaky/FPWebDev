@extends('layout/musician')
@section('title','MINDER')
@section('container')
<!-- START MUSICIAN PAGE -->
<div class="container">
    
    <div class="row m-0" style="padding-top:30px">
        <div class="col-sm-4 pl-0 wow fadeInLeft">
            <img src="assets/{{ Session::get('dp_url') }}" style="width:100%"alt="">
        </div>
        <div class="col-sm-8 pl-4">
            <div style="text-align:center">
                <h1 style="color:#0883CC;font-family:quicksand;font-weight:bold;font-size:50px">
                {{ Session::get('name') }}
                </h1>
                <h2 style = "color:#5DC86D;font-family: Quicksand;font-weight: bold;line-height: 25px;font-size: 20px">
                {{ Session::get('instrument') }}, GENRE: {{ Session::get('genre') }}, REGION: {{ Session::get('region') }}
                </h2>
            </div>
            <div style = "text-align:left">
                <p style="font-family: Quicksand;font-weight: bold;font-size: 24px;color: #61BDDC;padding-top:10px">
                    Musician Description :
                </p>
                <p style="font-family: Quicksand;font-weight: bold;font-size: 18px;color: #61BDDC" >
                {{ Session::get('description') }}
                </p>
            </div>
                <div class="row p-0 m-0" style="padding-top:80px">
                    <div class="col-sm-6 pl-0" style="padding-top:10px">
                        <p style="font-family: Quicksand;font-weight: bold;font-size: 20px;color: #61BDDC">
                            STATUS : <br> {{ Session::get('status') }}
                        </p>    
                    </div>
                    <div class="col-sm-6">
                    <a href="{{ url('/musicianstatus') }}">
                        <button class="btn-blue" style="border-radius:50px;font-family: Quicksand"> CHANGE STATUS </button><br><br>
                    </a>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- END MUSICIAN PAGE -->
<!-- PARALLAX -->
<div style="padding-top:50px">
    <div class="parallax" style="text-align: center;padding:80px 0px 40px 0px">
        <h1 style="color: white;font-size: 70px">IT’S SO MUCH MORE THAN <br> JUST A BAND</h1>
    </div>
</div>
<!-- END OF PARALLAX -->
<!-- START CONTENT 2  -->
<div class="row m-0" style="padding: 80px 0px">
    <div class="col-sm-6" style="text-align:center;">
      <h1 style="color:#2EA8D1;font-family:quicksand;font-weight:bold;padding:120px 50px 0px 50px"> ARE YOU A SOLO MUSICIAN? FIND YOUR BAND NOW! </h1>
      <a href="{{ url('/musicianfindband') }}">
      <button class="btn-blue" style="margin-top:5%">FIND BAND</button>
      </a>
    </div>
    <div class="col-sm-6 wow fadeInRight" style="text-align:center" >
      <img src="assets/bassist 1.png" alt="">
    </div>
</div>
<!-- END CONTENT 2 -->
@endsection