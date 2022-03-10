@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Important Website</h4>
        <p class="card-description"> edit important website link </p>
        <form action="{{ route('website.update.store',$edit->id) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="website_title">Website Name</label>
            <input value="{{ $edit->website_title }}" type="text" class="form-control"  name="website_title" id="website_title" placeholder="Enter Website Title">
          @error('website_title')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="website_link">Website Link</label>
            <input value="{{ $edit->website_link }}" type="text" class="form-control" name="website_link" id="website_link" placeholder="Enter Website Link">
            @error('website_link')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Create</button>
        </form>
        <br>
        <a href="{{ route('website.index') }}"><button class="btn btn-dark">Cancel</button></a> 
      </div>
    </div>
  </div>
@endsection