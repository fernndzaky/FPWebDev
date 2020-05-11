@extends('layout/musician')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding-top:30px">
        <div class="col-sm-6" style="">
            <h1 style="font-family: Quicksand;font-weight: bold;font-size: 40px;font-style: normal;">{{$count}} <span style="color:#61BDDC">BANDS MATCHED</span> </h1>
        </div>
        <div class="col-sm-6 " style="text-align:right;padding-right:60px">
        
        <?php
        if($count == 0){?>
            <a href="{{ url('/musician-dashboard') }}">
            <button class="btn-blue">BACK TO HOME</button>
        </a> 
        <?php
        }
        else{ ?>
        {{ Form::open(array('action' => 'UsersController@apply2')) }}
        @csrf
            <button class="btn-blue" style="border-radius: 40px;" type="submit" name="submit">DONE</button><br><br>
        
       
        <?php } ?>
        </div>
    </div>
    <hr></hr>

    <div class="row m-0" style="padding-top:30px">
    @foreach($bands as $bands)
    <div class="col-sm-4" style="margin-top:15px">
            <div class="card wow pulse" style="">
                <div style="text-align: center">
                    <img src="assets/band_dp/{{$bands->dp_url}}" style="height:338px;width:auto;max-width:339px;"alt="">

                </div>
                <div class="card-body">
                    <div>
                        <p class="card-text" style="font-family: Quicksand;font-weight: bold;font-size: 24px;color: #61BDDC;text-align:center">{{$bands->name}}</p>
                    </div>
                    <div >
                        <a href="/band/{{$bands->detail_id}}" target="_blank"
                            class="btn-signup" style="width:100%;color:#F4FCFF;font-size: 20px;font-weight: bold; font-family: Quicksand;text-align: center"> VIEW DETAIL </button>
                        </a>
                    </div>
                    <div>
                        <div class="form-check">
                        <input type="checkbox" id="inlineCheckbox1" name="appliedBands[]" value="{{$bands->detail_id}}"> 
                            
                            <!-- <input class="form-check-input" type="checkbox" name="appliedbands[]" value="{{$bands->detail_id}}" id="appliedbands"> -->
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
   