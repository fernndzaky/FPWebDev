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
            <th scope="col">POSITION</th>
            <th scope="col">STATUS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>FERNANDHA DZAKY</td>
            <td>PIANIST</td>
            <td style="color:red">REJECTED</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>YOHANES HARYO NUGROHO</td>
            <td>PIANIST</td>
            <td style="color:green;">ACCEPTED</td>
            </tr>
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
                    <th scope="col">POSITION</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>FERNANDHA DZAKY</td>
                    <td>PIANIST</td>
                    <td >
                        <button class="btn-accept" style="color:white;font-weight:bold">CONTACT</button>
                        <button class="btn-reject" style="color:white;font-weight:bold">REJECT</button></td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>YOHANES HARYO NUGROHO</td>
                    <td>PIANIST</td>
                    <td>
                        <button class="btn-accept" style="color:white;font-weight:bold">CONTACT</button>
                        <button class="btn-reject" style="color:white;font-weight:bold">REJECT</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

</div>

@endsection