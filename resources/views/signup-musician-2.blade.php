@extends('layout/main')

@section('title','MINDER')


@section('container')
<!-- center 1 content -->
<div class="row p-0 m-0">
  <div class="col-sm-6 pl-0" > 
  <img src="assets/bassist 1.png" style="width:100%"alt="">
  </div>
  <div class="col-sm-6" style="padding: 10px 100px 100px 100px" >
    <h1 style="color: #2EA8D1;text-align:center;">MUSICIAN SIGN UP</h1><br>
    <form>
      <div class="form-group">
        <input style="color: #61BDDC" type="name" class="form-control" id="name" placeholder="INSERT YOUR NAME">
      </div>
      <div class="form-group">
        <label for="genre">CHOOSE YOUR GENRE</label>
        <select class="form-control" id="genre" name="genre">
          <option>Rock</option>
          <option>Jazz</option>
          <option>Indie</option>
        </select>
      </div>

      <div class="form-group">
        <label for="region">CHOOSE YOUR REGION</label>
        <select class="form-control" id="region" name="region">
          <option>Jakarta Utara</option>
          <option>Jakarta Barat</option>
          <option>Jakarta Selatan</option>
        </select>
      </div>

      <div class="form-group">
        <label for="instrument">CHOOSE YOUR INSTRUMENT</label>
        <select class="form-control" id="instrument" name="instrument">
          <option>Guitar</option>
          <option>Drum</option>
          <option>Bass</option>
        </select>
      </div>

      <div class="form-group">
        <label for="description">INSERT YOUR DESCRIPTION</label>
        <textarea class="form-control" id="description" rows="3"></textarea>
      </div>
      <div style="text-align:center">
      <button class="btn-blue" style="border-radius: 40px;">SIGN UP</button><br><br>

      </div>
    </form>

  </div>
</div>
<!--  end center 1 content -->
@endsection