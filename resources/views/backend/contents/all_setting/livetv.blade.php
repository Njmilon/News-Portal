@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Live Tv Setting</h4>
        <p class="card-description"> create live tv setting here </p>

        @if ($tv->status == 1)
          <a href="{{ route('set.offline') }}"><button class="btn btn-danger">Set Offline</button></a> 
          <br>
          <small style="color: green">Live tv Now in Online</small>
          <br><br>

        @else
          <a href="{{ route('set.online') }}"><button class="btn btn-success">Set Online</button></a>
          <br>
          <small style="color: red">Live tv Now in Offline</small>
          <br><br>

        @endif
        

       

        <form action="{{ route('livetv.link.update') }}" method="POST"> 
            @csrf

          <div class="form-group">
            <label for="embed_code">Embed Code of Live Tv</label>
            <textarea name="embed_code" class="form-control" id="embed_code" rows="4">{{ $tv->embed_code }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection