@extends('layout/band')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding: 80px 0px">
        <div class="col-sm-6" style="text-align:center;">
            <h1 style="color:#2EA8D1;font-family:quicksand;font-weight:bold;padding:120px 50px 0px 50px"> MY STATUS </h1>
            <p style="font-family: Quicksand;font-weight: bold;font-size: 40px;text-align: center;color: #3883C6">Currently you are :</p>
            <div class="form-group">
                <select class="form-control" id="genre" name="genre">
                    <option value="" disabled selected>CHANGE STATUS</option>
                    <option>Pianist</option>
                    <option>Vocalist</option>
                    <option>Bassist</option>
                    <option>Guitarist</option>
                    <option>Drummer</option>
                </select>
                <a href="{{ url('/bandpage') }}">
                    <button class="btn-blue" style="margin-top:5%">UPDATE</button>
                </a>
            </div>
        </div>
            <div class="col-sm-6 wow fadeInRight" style="text-align:center" >
                <img src="assets/bassist 1.png" alt="">
            </div>
    </div>
</div>

@endsection