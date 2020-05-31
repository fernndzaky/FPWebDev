@extends('layout/band')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0" style="padding: 40px 0px">
        <div class="col-sm-6" >
            <h1 style="color:#2EA8D1;font-family:quicksand;font-weight:bold;padding:0px 50px 0px 50px;text-align:center"> MY PROFILE </h1>
            <form method="post" id="formImgInp" action="band/{{ Session::get('detail_id') }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <!-- <p style="font-family: Quicksand;font-weight: bold;font-size: 40px;text-align: center;color: #3883C6">Currently you are :</p> -->
                <div class="form-group" style="margin-top: 3%">
                    <label for="description" >CHANGE DISPLAY PICTURE</label>
                    <input accept="image/*"  id="upload" type="file" name="image" onchange="readURL(this);" class="form-control">                
                </div>
                <div class="form-group" style="margin-top: 3%">
                    <label for="description">CHANGE STATUS</label>
                    <select  class="form-control" id="status" name="status">
                        <option value="0" disabled selected>Your Status : {{ Session::get('status') }}</option>
                        
                        <option value="1">Currently looking for pianist</option>
                        <option value="2">Currently looking for drummer</option>
                        <option value="3">Currently looking for singer</option>
                        <option value="4">Currently looking for guitarist</option>
                        <option value="5">Currently looking for bassist</option>
                        <option value="7">Currently not looking for any musician</option>

                        
                    </select>
                    <div class="form-group" style="margin-top: 3%">
                        <label for="description">CHANGE YOUR DESCRIPTION</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ Session::get('description') }}</textarea>
                    </div>
                    <!-- <a href="{{ url('/band-dashboard') }}"></a> -->
                    <button class="btn-blue" >UPDATE PROFILE</button>
                </div>
            </form>
            </div>
            <div class="col-sm-6 wow fadeInRight" style="text-align:center" >
                <img id="dp" src="assets/band_dp/{{ Session::get('dp_url') }}" alt="" class="img-fluid" style="max-height:500px">
            </div>
    </div>
</div>


@endsection
