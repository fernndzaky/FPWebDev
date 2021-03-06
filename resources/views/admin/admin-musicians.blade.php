@extends('/layout/admin')

@section('title','MINDER')

@section('container')

<div class="row m-0">
  <div class="col-md-6 p-4">
    <h2>Musicians List</h2>
  </div>
  <div class="col-md-6 p-4">
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
  </div>
  @foreach($user as $user)

  <!-- ONE USER -->
  <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;height: 220px;">
      <div class="row no-gutters">
        <div class="col-md-4">
        <img style="max-height:220px" src="assets/musician_dp/{{$user['dp_url']}}" class="card-img img-fluid" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$user['name']}}</h5>
            <p class="card-text">
              Instrument : {{$user['instrument_name']}} <br>    Genre : {{$user['genre_name']}}<br>   Region : {{$user['region_name']}}
            </p>

         
            <!-- <p class="card-text"><
              small class="text-muted">Last updated 3 mins ago</small></p> -->
              <form action="delete/{{$user['detail_id']}}" method="post">
              @method('delete')
              @csrf
                <button class="btn btn-danger">Delete</button>
          
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- END OF ONE USER -->
    @endforeach


    

</div>
@endsection