@extends('layout/band')
@section('title','MINDER')
@section('container')
<!-- START MUSICIAN PAGE -->
<div class="container">
    @foreach($data as $data)
    <div class="row m-0" style="padding-top:30px">
    <div class="col-sm-4 pl-0 wow fadeInLeft" style="text-align: center">
   
    <img src="{{ url('assets/musician_dp/'.$data->dp_url.'') }}" style="max-width:350px;max-height:338px;width:auto"alt="">
        </div>
        <div class="col-sm-8 pl-4">
            <div style="text-align:center">
                <h1 style="color:#0883CC;font-family:quicksand;font-weight:bold;font-size:50px">
                {{$data->name}}
                </h1>
                <h2 style = "color:#5DC86D;font-family: Quicksand;font-weight: bold;line-height: 25px;font-size: 20px">
                {{$data->instrument_name}}, GENRE : {{$data->genre_name}}, REGION : {{$data->region_name}}
                </h2>
            </div>
            <div style = "text-align:left">
                <p style="font-family: Quicksand;font-weight: bold;font-size: 24px;color: #61BDDC;padding-top:10px">
                    Musician Description :
                </p>
                <p style="font-family: Quicksand;font-weight: bold;font-size: 18px;color: #61BDDC" >
                {{$data->description}}               </p>
            </div>
                <div class="row p-0 m-0" style="padding-top:80px">
                    <div class="col-sm-6 pl-0" style="padding-top:10px">
                        <p style="font-family: Quicksand;font-weight: bold;font-size: 20px;color: #61BDDC">
                            STATUS : <br> {{$data->status_name}}
                        </p>    
                    </div>
                </div>
        </div>
    </div>
    @endforeach
</div>
<!-- END MUSICIAN PAGE -->
@endsection
