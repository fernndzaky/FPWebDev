@extends('layout/main')

@section('title','MINDER')


@section('container')
<!-- center 1 content -->
<div class="row p-0 m-0">
  <div class="col-sm-6 pl-0" > 
  <img id="bassist-img"src="assets/bassist 1.png" style="width:100%"alt="">
  </div>
  <div id="forum-padding" class="col-sm-6" style="text-align:center;padding:100px" >
    <h1 style="color: #2EA8D1">SIGN UP</h1><br>
    {{ Form::open(array('action' => 'UsersController@store1')) }}

    <!-- <form method="post" action="{{ url('/signup-musician-2') }}"> -->
      @csrf
      <div class="form-group">
        <input required style="color: #61BDDC" name="username" type="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="INSERT USERNAME">
        @error('username')
          <div class="invalid-feedback" style="text-align: left !important">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <input required style="color: #61BDDC" name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="INSERT PASSWORD">
        @error('password')
          <div class="invalid-feedback" style="text-align: left !important">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <input required style="color: #61BDDC" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="INSERT PHONE NUMBER">
        @error('phone')
          <div class="invalid-feedback" style="text-align: left !important">
            {{$message}}
          </div>
        @enderror
      </div>
 
      <button type="submit" name="submit" class="btn-blue" style="border-radius: 40px;">NEXT</button><br><br>
    </form>

  </div>
</div>
<!--  end center 1 content -->
@endsection
