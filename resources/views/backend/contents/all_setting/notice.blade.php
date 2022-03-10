@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Notice Setting</h4>
        <p class="card-description"> create notice setting here </p>

        @if ($notice->status == 1)
          <a href="{{ route('notice.set.offline') }}"><button class="btn btn-danger">Set Offline</button></a> 
          <br>
          <small style="color: green">Notice Now in Online</small>
          <br><br>

        @else
          <a href="{{ route('notice.set.online') }}"><button class="btn btn-success">Set Online</button></a>
          <br>
          <small style="color: red">Notice Now in Offline</small>
          <br><br>

        @endif
        

       

        <form action="{{ route('notice.link.update') }}" method="POST"> 
            @csrf

          <div class="form-group">
            <label for="summernote">Notice</label>
            <textarea name="notice" class="form-control" id="summernote" rows="4">{{ $notice->notice }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection