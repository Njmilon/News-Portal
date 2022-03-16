@extends('backend.master')

@section('admin_content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title mb-4"><strong>{{Auth::user()->name}}</strong> <small>Dashboard</small> </h3>

        <a href="{{ route('edit.user.dashboard',$user->id) }}">
          <button class="btn btn-info btn-rounded btn-fw"> Edit Dashboard Info</button> 
      </a><br><br>

        <div class="card" style="width: 18rem;">
            <img src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" style="height: 200px; width: 180px;" class="card-img-top" alt="User-Image">
            <div class="card-body">

              {{-- <div class="card" style="width: 18rem;"> --}}
                <ul class="list-group">
                  <li class="list-group-item" style="background-color: #191c24;">Name: {{ $user->name }}</li>
                  <li class="list-group-item" style="background-color: #191c24;">Email: {{ $user->email }}</li>
                  <li class="list-group-item" style="background-color: #191c24;">Phone-No: {{ $user->mobile }}</li>
                  <li class="list-group-item" style="background-color: #191c24;">Address: {{ $user->address }}</li>
                  <li class="list-group-item" style="background-color: #191c24;">Gender: {{ $user->gender }}</li>
                  <li class="list-group-item" style="background-color: #191c24;">Designation: {{ $user->designation }}</li>
                  <li class="list-group-item" style="background-color: #191c24;">Role</li>
                </ul>
              {{-- </div> --}}
    <div class="table-responsive">
        <table class="table">
              <td> 
                  @if ($user->category == 1)
                  <span class="badge badge-success">Category</span>
                  @else
                  @endif
                  
                  @if ($user->division == 1)
                  <span class="badge badge-primary">Division</span>
                  @else
                  @endif

                  @if ($user->post == 1)
                  <span class="badge badge-warning">Post</span>
                  @else
                  @endif

                  @if ($user->setting == 1)
                  <span class="badge badge-danger">Setting</span>
                  @else
                  @endif

                  @if ($user->website == 1)
                  <span class="badge badge-success">Website</span>
                  @else
                  @endif

                  @if ($user->gallery == 1)
                  <span class="badge badge-primary">Gallery</span>
                  @else
                  @endif

                  @if ($user->advertisement == 1)
                  <span class="badge badge-warning">Ads</span>
                  @else
                  @endif

                  @if ($user->role == 1)
                  <span class="badge badge-danger">Role</span>
                  @else
                  @endif
              </td>
        </table>
      </div>
            </div>
          </div>                       
    </div>
  </div>

</div>

</div>

 


@endsection