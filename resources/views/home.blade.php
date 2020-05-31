@extends('layout/main')

@section('title','MINDER')


@section('container')
  <!-- top content --> 
    <div class="box">
    <div class="img-home" style="">
      <img id="home-img"  style="width: 100%;height:700px" src="assets/band 2.jpg" alt="">
    </div>
      <div class="text wow fadeInLeft">
        <h1 id="top-title" style="color: white;font-size: 70px">YOUR TOP SOLUTION FOR FINDING BAND MEMBER</h1>
        <a href="{{ url('/signin-band') }}">
          <button class="btn-blue" style="border-radius: 40px">FIND MUSICIAN</button>
        </a>
        <a href="{{ url('/signin-musician') }}">
        <button id="btn-findband" class="btn-blue" style="border-radius: 40px;display: inline-block;">FIND BAND</button>
        </a>
      </div>
    </div>
  <!-- end of top content -->
     
  <!-- center 1 content -->
    <div class="row p-0 m-0">
      <div class="col-sm-6 wow fadeInLeft" > 
        <img class="img-fluid" id="naksotoy-img" src="assets/naksotoy1.png"  style="padding-top:40px;padding-bottom:40px"alt="">
      </div>
      <div id="findmus-txt"class="col-sm-6" style="text-align:center;padding-top:150px" >
        <h1 style="padding-bottom:20px;color:#2EA8D1;font-family:quicksand"> ARE YOU LOOKING FOR A BAND MEMBER ? MAYBE DRUMMER ? </h1>
        <h2 style="padding-bottom:30px;color:#0870CC;font-family:quicksand">Find your new band member now from Minder!</h2>
        <a href="{{ url('/signin-band') }}">
          <button class="btn-blue" style="border-radius: 40px;">FIND MUSICIAN</button>
        </a>
        </div>
    </div>
  <!--  end center 1 content -->

  <!-- parallax -->
    <div class="parallax" style="text-align: center;padding:80px 0px 40px 0px">
      <h1 id="morethan-txt" style="color: white;font-size: 70px">IT’S SO MUCH MORE THAN <br> JUST A BAND</h1>
    </div>
  <!-- end of parallax -->

  <!-- start content 2  -->
  <div class="row m-0" style="padding: 80px 0px">
    <div class="col-sm-6 pl-0" style="text-align:center;">
      <h1 id="findband-txt"style="color:#2EA8D1;font-family:quicksand;font-weight:bold;padding:120px 50px 0px 50px"> ARE YOU A SOLO MUSICIAN? FIND YOUR BAND NOW! </h1>
      <button class="btn-blue" style="margin-top:5%">FIND BAND</button>
    </div>
    <div class="col-sm-6 wow fadeInRight" style="text-align:center" >
      <img class="img-fluid" id="bassist-img" src="assets/bassist 1.png" alt="">
    </div>
  </div>
  <!-- end content 2 -->

  <!-- bottom content -->
  <div class="row  ml-0 mr-0" style="background-color:#0874CC;padding-top:5%">
    <div class ="col-sm-12"style=""> 
      <h1 id="meet-developers" style ="color:white; font-family:quicksand;font-weight:bold;text-align:center;font-size:60px"> MEET THE DEVELOPERS </h1>
    </div>
    <div class="col-sm-6 wow fadeInRight" style="text-align:right;padding-top:50px">
      <img src="assets/nugie 1.png" style="" alt="">
      <h1 style="color:white;font-family:quicksand;font-weight:bold;margin-top:5%;padding-bottom:80px">Yohanes Haryo Nugroho</h1>
    </div>
    <div class="col-sm-6 wow fadeInRight" style="text-align:left;padding-top:50px">
      <img src="assets/dzaky 1.png" style="" alt="">
      <h1 style="color:white;font-family:quicksand;font-weight:bold;margin-top:5%;padding-bottom:80px">Fernandha Dzaky Saputra</h1> 
    </div>
  </div>
  <!-- end of bottom content -->

@endsection
