@extends('layout/main')

@section('title','MINDER')


@section('container')
<!-- center 1 content -->
<div class="row p-0 m-0">
  <div class="col-sm-6 pl-0" > 
  <img src="assets/bassist 1.png" style="width:100%"alt="">
  </div>
  <div class="col-sm-6" style="padding: 10px 100px 100px 100px" >
    <h1 style="color: #2EA8D1;text-align:center;">BAND SIGN UP</h1><br>
      {{ Form::open(array('action' => 'UsersController@store4')) }}
      @csrf

      <div class="form-group">
        <input style="color: #61BDDC" type="name" name="name" class="form-control" id="name" placeholder="INSERT BAND NAME">
      </div>
      <div class="form-group">
        <label for="genre">CHOOSE BAND GENRE</label>
        <select class="form-control" id="genre" name="genre">
          @foreach($genres as $genres)
          <option value="{{$genres->genre_id}}">{{$genres->genre_name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="region">CHOOSE BAND REGION</label>
        <select class="form-control" id="region" name="region">
          @foreach($region as $region)
          <option value="{{$region->region_id}}">{{$region->region_name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="description">INSERT BAND DESCRIPTION</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
      </div>
      <div style="text-align:center">
      <button type="submit" name="submit" class="btn-blue" style="border-radius: 40px;">SIGN UP</button><br><br>

      </div>
    </form>

  </div>
</div>
<!--  end center 1 content -->
@endsection