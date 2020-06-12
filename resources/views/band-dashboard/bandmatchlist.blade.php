@extends('layout/band')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding-top:30px">
        <div class="col-sm-6" style="">
            <h1 style="font-family: Quicksand;font-weight: bold;font-size: 40px;font-style: normal;">{{$count}} <span style="color:#61BDDC">MUSICIANS MATCHED</span> </h1>
        </div>
        <div class="col-sm-6 btn-done" style="text-align:right;">
        <?php
        if($count == 0){?>
            <a href="{{ url('/band-dashboard') }}">
            <button class="btn-blue">BACK TO HOME</button>
        </a> 
        <?php
        }
        else{ ?>
   
            {{ Form::open(array('action' => 'UsersController@apply')) }}
            @csrf
                <button class="btn-blue" id="btncheck" style="border-radius: 40px;" type="submit" name="submit" disabled >DONE</button>
                <br><br>
        
        <?php } ?>
        
        <!-- <a href="{{ url('/bandsuccess') }}">
            <button class="btn-blue">DONE</button>
        </a> -->
        </div>
    </div>
    <hr></hr>

    <div class="row m-0" style="padding-top:30px">
        @foreach($arrMusicians as $musicians)
          <div class="col-sm-4" style="margin-top:15px">
            <div class="card wow pulse" style="">
                <div style="text-align: center">
                    <img src="assets/musician_dp/{{$musicians['dp_url']}}" style="height:338px;width:auto;;max-width:339px;"alt="">

                </div>
                <div class="card-body">
                    <div>
                        <p class="card-text" style="font-family: Quicksand;font-weight: bold;font-size: 24px;color: #61BDDC;text-align:center">{{$musicians['name']}}</p>
                    </div>
                    <div  class="btn-signup mt-2" style="text-align: center">
                        <a href="/musician/{{$musicians['detail_id']}}" target="_blank"
                             class="btn-signup" style="color:#F4FCFF;font-size: 20px;"> VIEW DETAIL </button>
                        </a>
                    
                    </div>
                    <div>
                        <div class="form-check mt-2" style="text-align: center;padding-left: 0px !important">
                        <input onclick="terms_changed(this)" type="checkbox" id="appliedMusicians" name="appliedMusicians[]" value="{{$musicians['detail_id']}}"> 
                            <label class="form-check-label" for="defaultCheck1">
                                APPLY TO THIS MUSICIAN
                            </label>
                        </div>
                         
                    </div>
                </div>    
            </div> 
           
        </div>
        @endforeach
    </div>
    </form>
</div>
@endsection
   
   
