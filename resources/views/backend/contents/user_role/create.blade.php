@extends('backend.master')

@section('admin_content')

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create User With Role</h4>

        <form action="{{ route('store.user.role') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" id="name">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" id="email">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" id="password">
          </div>
          <label for="email"> Select Role:  </label>

<div class="row">
     <div class="col-md-6">
            <div class="form-group">   
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="category" type="checkbox" class="form-check-input"> Category <i class="input-helper"></i></label>
              </div>
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="division" type="checkbox" class="form-check-input"> Division <i class="input-helper"></i></label>
              </div>
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="post" type="checkbox" class="form-check-input"> Posts <i class="input-helper"></i></label>
              </div>
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="setting" type="checkbox" class="form-check-input"> Setting <i class="input-helper"></i></label>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="website" type="checkbox" class="form-check-input"> Website <i class="input-helper"></i></label>
              </div>
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="gallery" type="checkbox" class="form-check-input"> Gallery <i class="input-helper"></i></label>
              </div>
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="advertisement" type="checkbox" class="form-check-input"> Advertisement <i class="input-helper"></i></label>
              </div>
              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input value="1" name="role" type="checkbox" class="form-check-input"> Role <i class="input-helper"></i></label>
              </div>
            </div>
          </div>
</div>
          <button type="submit" class="btn btn-primary mr-2">Create</button>
        </form>
        <a href="{{ route('dashboard') }}"><button class="btn btn-dark mt-2">Cancel</button></a> 
      </div>
    </div>
  </div>
</div>
@endsection