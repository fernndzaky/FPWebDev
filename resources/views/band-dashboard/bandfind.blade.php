@extends('layout/band')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding: 80px 0px">
        <div class="col-sm-6 wow fadeInLeft" style="text-align:center" >
            <img class="img-fluid"src="assets/bassist 1.png" alt="">
        </div>
        <div class="col-sm-6" style="text-align:center;">
        @if (session('notFound'))
        <div class="alert alert-danger">
        1
        </div>
         @endif
        {{ Form::open(array('action' => 'UsersController@findMusician2')) }}
                    @csrf
                <label for="genre" style="font-family: Quicksand;font-weight: bold;font-size: 60px;font-size: 60px;color: #2EA8D1">FIND MUSICIANS</label>
                <div class="form-group">
                    <select required class="form-control" id="region" name="region">
                    <label for="region">REGION</label>
                        <option value="" disabled selected>SELECT DESIRED REGION</option>
                        @foreach($regions as $regions)
                        <option value="{{$regions->region_id}}">{{$regions->region_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select required class="form-control" id="instrument" name="instrument">
                    <label for="instrument">INSTRUMENT</label>
                        <option value="" disabled selected>SELECT DESIRED INSTRUMENT</option>
                        @foreach($instruments as $instruments)
                        <option value="{{$instruments->instrument_id}}">{{$instruments->instrument_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select required class="form-control" id="genre" name="genre">
                    <label for="instrument">GENRE</label>
                        <option value="" disabled selected>SELECT DESIRED GENRE</option>
                        @foreach($genres as $genres)
                        <option value="{{$genres->genre_id}}">{{$genres->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
                
                    <button class="btn-blue" style="border-radius: 40px;" type="submit" name="submit">NEXT</button><br><br>
                </form> 
        </div>
            </div>
    </div>


</div>

@endsection