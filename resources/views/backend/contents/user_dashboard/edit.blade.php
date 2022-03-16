@extends('backend.master')

@section('admin_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit User With Role</h4>

        <form action="{{ route('store.user.dashboard',$useredit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ $useredit->name }}" type="text" class="form-control" name="name" id="name">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ $useredit->email }}" type="email" class="form-control" name="email" id="email">
          </div>

          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input value="{{ $useredit->mobile }}" type="number" class="form-control" name="mobile" id="mobile">
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input value="{{ $useredit->address }}" type="text" class="form-control" name="address" id="address">
          </div>

          <div class="form-group">
            <label for="designation">Designation</label>
            <input value="{{ $useredit->designation }}" type="text" class="form-control" name="designation" id="designation">
          </div>

          <div class="row">       
            <div class="form-group col-md">
              <label for="gender">Select Gender:</label>
              <select name="gender" class="form-control" id="gender">
                <option selected hidden>Select Gender</option>
               <option {{ $useredit->gender ==  "Male" ? "selected" : "" }} value="Male"> Male </option>
               <option {{ $useredit->gender ==  "Female" ? "selected" : "" }} value="Female"> Female </option>
              </select>
            </div>
        </div>

          <div class="mb-3">
            <label class="form-label">Image</label>
            <input required type="file" name="image" class="form-control-file" id="image">
          </div>

          <div class="mb-3">
            <img id="showImage" src="{{ (!empty($useredit->image)) ? url('upload/user_images/'.$useredit->image) : url('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border:1px solid #000000" >
          </div>
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
</div>

<script type="text/javascript">

$(document).ready(function(){
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});

</script>

@endsection