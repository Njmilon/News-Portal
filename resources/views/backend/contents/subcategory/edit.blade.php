@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit SubCategory</h4>
        <p class="card-description"> edit subcategory info </p>

      <form action="{{ route('subcategory.update',$edit->id) }}" method="POST">
            @csrf

            {{-- get subcategory table data here --}}
          <div class="form-group">
            <label for="exampleInputName1">English Name *</label>
            <input type="text" value="{{ $edit->subcategory_en }}" class="form-control"  name="subcategory_en" id="exampleInputName1" placeholder="Enter English Name">
            @error('subcategory_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name *</label>
            <input type="text" value="{{ $edit->subcategory_ban }}" class="form-control" name="subcategory_ban" id="exampleInputName2" placeholder="Enter Bangla Name">
            @error('subcategory_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          {{-- get category table data here --}}
          <div class="form-group">
            <label for="exampleFormControlSelect2">Select Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect2">

                @foreach ($categories as $row)
                    <option value="{{ $row->id }}" @if ( $row->id == $edit->category_id)
                      selected @endif >

                      {{ $row->category_en }} | {{ $row->category_ban }}
                    </option>
                @endforeach
             
            </select>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
          <a href="{{ route('category.index') }}"><button class="btn btn-dark">Cancel</button></a> 
      </form>
      </div>
    </div>
  </div>
@endsection