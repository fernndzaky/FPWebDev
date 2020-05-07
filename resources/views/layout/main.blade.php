<!doctype html>
<html lang="en">
  <head>
    <link rel="icon" href="assets/icon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link rel="stylesheet" href="css/animate.css">

    <title>Minder</title>
    
    <style>
    .box{
        position: relative;
    }
    .box .text{
        position: absolute;
        z-index: 999;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 40%;  
        text-align: center;
        width: 60%; 
    }
    .btn-signup{
        background-color:#0883CC;
        border-radius:10px;
        
    }
    .btn-login{
        background-color:#5DC86D;
        border-radius:10px;
    }
    .btn-blue{
      background-image: linear-gradient(-90deg, #0879CC,#2EA8D1);
      color: white;
      border: none;
      border-radius: 100px;
      padding: 25px 70px;
    }
    .btn-blue:hover{
      background-image: linear-gradient(-90deg, #2EA8D1, #2EA8D1);
      color: white;
      border: none;
      border-radius: 100px;
      padding: 25px 70px;

    }
    .parallax {
      /* The image used */
      background-image: url("assets/band 3.png");

      /* Set a specific height */
      height: 350px;

      /* Create the parallax scrolling effect */
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    </style>
  </head>
  <body style="font-family: Quicksand">
      

    <nav class="navbar navbar-expand-lg navbar-light pt-3">
      <div class="container">
        <a href="{{ url('/') }}">
          <img src="assets/logo1.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active" style="padding-right:20px">
                <a class="nav-link" href="{{ url('/signup') }}"style="font-family:quicksand;color: #61BDDC !important;font-weight:bold">Find Musician</a>
              </li>
              <li class="nav-item active"  style="padding-right:20px">
                <a class="nav-link" href="{{ url('/signup') }}"style="font-family:quicksand;color: #61BDDC !important;font-weight:bold">Find Band</a>
              </li>
              <li class="nav-item active"  style="padding-right:20px">
                <a class="nav-link" href="{{ url('/about') }}"style="font-family:quicksand;color: #61BDDC !important;font-weight:bold">About Us</a>
              </li>
              <li class="nav-item active"  style="padding-right:20px">
              <a class="nav-link btn-signup" style="color:white;family-font:quicksand"  href="{{ url('/signup') }}">Sign Up</a>
              </li>
              <li class="nav-item active"  style="padding-right:20px">
              <a class="nav-link btn-login" style="color:white;family-font:quicksand"  href="{{ url('/signin') }}">Sign In</a>
              </li>
          </ul>
          </form>
        </div>
      </div>
    </nav>
     
    @yield('container')

    <div class="container pt-5 pb-5"style="text-align: center;">
      <div class="col-12" >
        <img src="assets/logo1.png" alt="">
      </div>
      <div class="col-12">
      <p style="color:#2EA8D1">A Website Development & Security Final Project By : Yohanes Haryo Nugroho and Fernandha Dzaky</p>
      <p style="color:#2EA8D1">    Copyright@2020 Binus International</p>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
  </body>
</html>
