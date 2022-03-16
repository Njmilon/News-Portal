@extends('backend.master')

@section('admin_content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Change Password</h4>

                                {{-- Form --}}

        <form class="forms-sample" action="{{ route('user.change.password.store') }}" method="POST">

          @csrf

                                {{-- Link --}}
        <div class="row">       
            <div class="form-group col-md">
                <label for="current_password"> Current Password </label>
                <input value="{{ old('current_password') }}" name="current_password" type="password" class="form-control" id="current_password" placeholder="Enter Current Password">
              </div>
        </div> 
         
        <div class="row">       
            <div class="form-group col-md">
                <label for="password"> New Password </label>
                <input value="{{ old('password') }}" name="password" type="password" class="form-control" id="password" placeholder="Enter New Password">
              </div>
        </div> 

        <div class="row">       
            <div class="form-group col-md">
                <label for="password_confirmation"> Confirm Password </label>
                <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm New Password">
              </div>
        </div> 

          <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>



 


@endsection