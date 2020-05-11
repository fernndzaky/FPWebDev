@extends('layout/musician')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding: 80px 0px">
        <div class="col-sm-6 wow fadeInLeft" style="text-align:center" >
            <img class="img-fluid"src="assets/bassist 1.png" alt="">
        </div>
        <div class="col-sm-6" style="text-align:center;">
        {{ Form::open(array('action' => 'UsersController@findBand2')) }}
                    @csrf
                <label for="genre" style="font-family: Quicksand;font-weight: bold;font-size: 60px;font-size: 60px;color: #2EA8D1">FIND A BAND</label>
            <div class="form-group">
                <select required class="form-control" id="genre" name="genre">
                <label for="genre">CHOOSE BAND GENRE</label>
                    <option value="" disabled selected>SELECT DESIRED GENRE</option>

                    @foreach($genres as $genres)
                        <option value="{{$genres->genre_id}}">{{$genres->genre_name}}</option>
                    @endforeach
                </select>
            </div>
                <div class="form-group">
                    <select required class="form-control" id="region" name="region">
                    <label for="region">REGION</label>
                    <option value="" disabled selected>SELECT DESIRED REGION</option>

                    @foreach($regions as $regions)
                        <option value="{{$regions->region_id}}">{{$regions->region_name}}</option>
                    @endforeach
                    </select>
                </div>
                <a href="{{ url('/musicianmatchlist') }}">
                <button class="btn-blue" style="margin-top:5%">NEXT</button>
                </a>
            </form>
        </div>
            </div>
    </div>


</div>

@endsection
