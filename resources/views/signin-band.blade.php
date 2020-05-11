@extends('layout/main')

@section('title','MINDER')


@section('container')
<!-- center 1 content -->
<div class="row p-0 m-0">
  <div class="col-sm-6 pl-0" > 
  <img id="bassist-img"src="assets/bassist 1.png" style="width:100%"alt="">
  </div>
  <div id="forum-padding"class="col-sm-6" style="text-align:center;padding:100px" >
    <h1 id=""style="color: #2EA8D1">BAND SIGN IN</h1><br>
    @if(session()->has('message'))
          {{ session()->get('message') }}
          @endif
    {{ Form::open(array('action' => 'UsersController@loginBand')) }}
    @csrf
      <div class="form-group">
        <input style="color: #61BDDC" name="username" type="username" class="form-control" id="username" placeholder="INSERT USERNAME">
      </div>
      <div class="form-group">
      <input style="color: #61BDDC" name="password" type="password" class="form-control" id="password" placeholder="INSERT PASSWORD">
      </div>
 
      <button class="btn-blue" style="border-radius: 40px;">LOGIN</button><br><br>
    </form>
    <p>Don't have an account? <span><a href="{{ url('/signup') }}">Create new account now</a></span></p>

  </div>
</div>
<!--  end center 1 content -->
@endsection