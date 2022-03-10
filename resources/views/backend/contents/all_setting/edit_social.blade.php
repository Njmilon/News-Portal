@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Social Setting</h4>
        <p class="card-description"> create social setting here </p>
        
        <form action="{{ route('social.link.update') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input value="{{ $social->facebook }}" type="text" class="form-control" name="facebook" id="facebook">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Twitter</label>
            <input value="{{ $social->twitter }}" type="text" class="form-control" name="twitter" id="twitter">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Youtube</label>
            <input value="{{ $social->youtube }}" type="text" class="form-control" name="youtube" id="youtube">
          </div>

          <div class="form-group">
            <label for="linkedin">Linkedin</label>
            <input value="{{ $social->linkedin }}" type="text" class="form-control" name="linkedin" id="linkedin">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Instagram</label>
            <input value="{{ $social->instagram }}" type="text" class="form-control" name="instagram" id="instagram">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection