@extends('layout/band')
@section('title','MINDER')
@section('container')
<div class="container">
    <div class="row m-0"style="padding-top:30px">
        <div class="col-sm-12"style="text-align: center;">
            <p style="font-family:quicksand;font-weight: bold;color: #2EA8D1;font-size: 60px;"> APPLICATION SENT TO MUSICIANS</p>
        </div>
    </div>
    
    <table class="table table-striped"style="text-align:center;font-family:quicksand;font-weight:bold">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">NAME</th>
            <th scope="col">INSTRUMENTS</th>
            <th scope="col">STATUS</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($sent_from as $sent_from)
                
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$sent_from->name}}</td>
            <td>{{$sent_from->instrument_name}}</td>
            <td style="color:<?php if($sent_from->application_status=="Applied") echo "black"; else if($sent_from->application_status=="Contacted") echo "#5DC86D"; else echo "red"; ?>">{{$sent_from->application_status}}</td>
            </tr>
          
            @endforeach
        </tbody>
    </table>

        <div class="row m-0"style="padding-top:30px">
                <div class="col-sm-12"style="text-align: center;">
                    <p style="font-family:quicksand;font-weight: bold;color: #2EA8D1;font-size: 60px;"> APPLICATION FROM MUSICIANS</p>
                </div>
            </div>
            <table class="table table-striped"style="text-align:center;font-family:quicksand;font-weight:bold">
                <thead>
                    <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAME</th>
                    <th scope="col">INSTRUMENTS</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sent_to as $sent_to)

                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$sent_to->name}}</td>
                    <td>{{$sent_to->instrument_name}}</td>
                    <?php if($sent_to->application_status=="Contacted") {?>
                        <td style="color:#5DC86D">
                            <a target="_blank" href="https://wa.me/{{$sent_to->phone}}?text=I'm%20interested%20in%20you%20as%20musician">
                                Phone ({{$sent_to->phone}})
                            </a>
                        </td>                    <?php }
                    
                    else if($sent_to->application_status=="Rejected") {?>
                        <td style="color:red">{{$sent_to->application_status}}</td>
                    <?php }
                    
                    else {?>
                        <td >
                            <form method="post" action="update-contacted/{{$sent_to->application_id}}" style="display:inline-block">
                                @method('patch')
                                @csrf
                                <button class="btn-accept" style="color:white;font-weight:bold">CONTACT</button>
                            </form>
                            <form method="post" action="update-rejected/{{$sent_to->application_id}}" style="display:inline-block">
                                @method('patch')
                                @csrf
                                <button class="btn-reject" style="color:white;font-weight:bold;">REJECT</button>
                            </form>
                        </td>
                    <?php } ?>
                    
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
        </div>

</div>

@endsection