@extends('layout/musician')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0">
        <div class="col-sm-12"style="text-align:center">
            <img class ="wow flip"src= "assets/ok.png" style="width:30%"alt="">
            <p class="wow tada"style="font-family: Quicksand;font-weight: bold;font-size: 50px;text-align: center;color: #2EA8D1;"> SUCCESSFULY APPLIED TO THE BAND !</p>
            <a href="{{ url('/musicianpage') }}">
                <button class="btn-blue" style="margin-top:5%font-family: Quicksand;font-weight: bold">BACK TO HOME</button>
            </a>
            
        </div>
    </div>
    <div class="row m-0">

    </div>
</div>

@endsection