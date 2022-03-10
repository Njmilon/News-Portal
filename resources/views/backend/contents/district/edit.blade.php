@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Divisions</h4>
        <p class="card-description"> edit Divisions info </p>

        <form action="{{ route('district.update',$edit->id) }}" method="POST">      
            @csrf
            
          <div class="form-group">
            <label for="exampleInputName1">English Name *</label>
            <input type="text" value="{{ $edit->district_en }}" class="form-control"  name="district_en" id="exampleInputName1" placeholder="Enter English Name">
            @error('district_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name *</label>
            <input type="text" value="{{ $edit->district_ban }}" class="form-control" name="district_ban" id="exampleInputName2" placeholder="Enter Bangla Name">
            @error('district_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection