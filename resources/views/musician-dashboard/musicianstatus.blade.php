@extends('layout/musician')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding: 80px 0px">
        <div class="col-sm-6" style="text-align:center;">
            <h1 style="color:#2EA8D1;font-family:quicksand;font-weight:bold;padding:120px 50px 0px 50px"> MY STATUS </h1>
            <p style="font-family: Quicksand;font-weight: bold;font-size: 40px;text-align: center;color: #3883C6">Currently you are :</p>
            <div class="form-group">
                <select class="form-control" id="genre" name="genre">
                    <option>Looking for Band</option>
                    <option>In a Band</option>
            
                </select>
                <button class="btn-blue" style="margin-top:5%">UPDATE</button>
            </div>
        </div>
            <div class="col-sm-6 wow fadeInRight" style="text-align:center" >
                <img src="assets/bassist 1.png" alt="">
            </div>
    </div>
</div>

@endsection