@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create SubCategory</h4>
        <p class="card-description"> create new subcategory </p>
        <form action="{{ route('subcategory.create') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">English Name</label>
            <input value="{{ old('subcategory_en') }}" type="text" class="form-control" name="subcategory_en" id="exampleInputName1" placeholder="Enter Category English Name">
          @error('subcategory_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name</label>
            <input value="{{ old('subcategory_ban') }}" type="text" class="form-control" name="subcategory_ban" id="exampleInputName2" placeholder="Enter Category Bangla Name">
            @error('subcategory_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect2">Select Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                <option disabled selected>Select Category</option>
                @foreach ($categories as $row)
                     <option value="{{ $row->id }}">{{ $row->category_en }} | {{ $row->category_ban }}</option>
                @endforeach
             
            </select>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Create</button>
          <a href="#"><button class="btn btn-dark">Cancel</button></a> 
        </form>
      </div>
    </div>
  </div>
@endsection