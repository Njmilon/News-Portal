@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Category</h4>
        <p class="card-description"> create new category </p>
        <form action="{{ route('category.create') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">English Name</label>
            <input type="text" class="form-control"  name="category_en" id="exampleInputName1" placeholder="Enter Category English Name">
          @error('category_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name</label>
            <input type="text" class="form-control" name="category_ban" id="exampleInputName2" placeholder="Enter Category Bangla Name">
            @error('category_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Create</button>
          <a href="{{ route('category.index') }}"><button class="btn btn-dark">Cancel</button></a> 
        </form>
      </div>
    </div>
  </div>
@endsection