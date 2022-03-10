@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Category</h4>
        <p class="card-description"> edit category info </p>
        <form action="{{ route('category.update',$edit->id) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">English Name *</label>
            <input type="text" value="{{ $edit->category_en }}" class="form-control"  name="category_en" id="exampleInputName1" placeholder="Enter English Name">
            @error('category_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name *</label>
            <input type="text" value="{{ $edit->category_ban }}" class="form-control" name="category_ban" id="exampleInputName2" placeholder="Enter Bangla Name">
            @error('category_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
          <a href="{{ route('category.index') }}"><button class="btn btn-dark">Cancel</button></a> 
        </form>
      </div>
    </div>
  </div>
@endsection