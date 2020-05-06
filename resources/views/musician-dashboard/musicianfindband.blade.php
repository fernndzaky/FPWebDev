@extends('layout/musician')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding: 80px 0px">
        <div class="col-sm-6 wow fadeInLeft" style="text-align:center" >
            <img class="img-fluid"src="assets/bassist 1.png" alt="">
        </div>
        <div class="col-sm-6" style="text-align:center;">
                <label for="genre" style="font-family: Quicksand;font-weight: bold;font-size: 60px;font-size: 60px;color: #2EA8D1">FIND A BAND</label>
            <div class="form-group">
                <select class="form-control" id="genre" name="genre">
                <label for="genre">CHOOSE BAND GENRE</label>
                    <option>Rock</option>
                    <option>Jazz</option>
                    <option>Indie</option>
                </select>
            </div>
                <div class="form-group">
                    <select class="form-control" id="region" name="region">
                    <label for="region">REGION</label>
                        <option>Jakarta Utara</option>
                        <option>Jakarta Barat</option>
                        <option>Jakarta Selatan</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="instrument" name="instrument">
                    <label for="instrument">INSTRUMENT</label>
                        <option>INSTRUMENT</option>
                        <option>GUITAR</option>
                        <option>DRUM</option>
                        <option>BASS</option>
                        <option>VOCAL</option>
                    </select>
                </div>
                <a href="{{ url('/musicianmatchlist') }}">
                <button class="btn-blue" style="margin-top:5%">NEXT</button>
                </a>
        </div>
            </div>
    </div>


</div>

@endsection
