@extends('layout/band')
@section('title','MINDER')
@section('container')
<!-- START MUSICIAN PAGE -->
<div class="container">
    <div class="row m-0" style="padding-top:30px">
    <div class="col-sm-4 pl-0 wow slideInLeft" style="text-align: center">
        <img id="dp" src="assets/band_dp/{{ Session::get('dp_url') }}" style="max-width:350px;max-height:338px;width:auto"alt="">
        </div>
        <div class="col-sm-8 pl-4">
            <div style="text-align:center">
                <h1 style="color:#0883CC;font-family:quicksand;font-weight:bold;font-size:50px">
                {{ Session::get('name') }}
                </h1>
                <h2 class="wow bounceInDown"  style = "color:#5DC86D;font-family: Quicksand;font-weight: bold;line-height: 25px;font-size: 20px">
                GENRE : {{ Session::get('genre') }}, REGION : {{ Session::get('region') }}
                </h2>
            </div>
            <div style = "text-align:left">
                <p style="font-family: Quicksand;font-weight: bold;font-size: 24px;color: #61BDDC;padding-top:10px">
                    Band Description :
                </p>
                <p style="font-family: Quicksand;font-weight: bold;font-size: 18px;color: #61BDDC" >
                {{ Session::get('description') }}                </p>
            </div>
                <div class="row p-0 m-0" style="padding-top:80px">
                    <div class="col-sm-6 pl-0" style="padding-top:10px">
                        <p style="font-family: Quicksand;font-weight: bold;font-size: 20px;color: #61BDDC">
                            STATUS : <br> {{ Session::get('status') }}
                        </p>    
                    </div>
                    <div class="col-sm-6">
                    <a href="bandstatus">
                        <button class="btn-blue" style="border-radius:50px;font-family: Quicksand"> CHANGE STATUS </button><br><br>

                    </a>
                    
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- END MUSICIAN PAGE -->
<!-- PARALLAX -->
<div style="padding-top:50px">
    <div class="parallax" style="text-align: center;padding:80px 0px 40px 0px">
        <h1 id="morethan-txt"style="color: white;font-size: 70px">IT’S SO MUCH MORE THAN <br> JUST A BAND</h1>
    </div>
</div>
<!-- END OF PARALLAX -->
<!-- START CONTENT 2  -->
<div class="row p-0 m-0">
      <div class="col-sm-6 wow fadeInLeft" > 
        <img id="naksotoy-img"src="assets/naksotoy1.png"  style="padding-top:40px;padding-bottom:40px"alt="">
      </div>
      <div class="col-sm-6" style="text-align:center;padding-top:150px" >
        <h1 style="padding-bottom:20px;color:#2EA8D1;font-family:quicksand"> ARE YOU LOOKING FOR A BAND MEMBER ? MAYBE DRUMMER ? </h1>
        <h2 style="padding-bottom:30px;color:#0870CC;font-family:quicksand">Find your new band member now from Minder!</h2>
        {{ Form::open(array('action' => 'UsersController@findMusician1')) }}
        @csrf
            <button class="btn-blue" style="border-radius: 40px;" type="submit" name="submit">FIND MUSICIAN</button><br><br>
        </form> 
        </div>
    </div>
<!-- END CONTENT 2 -->
@endsection
