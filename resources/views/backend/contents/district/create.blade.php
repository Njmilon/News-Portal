@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Divisions</h4>
        <p class="card-description"> create new divisions </p>
        <form action="{{ route('district.create') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">English Name</label>
            <input type="text" class="form-control"  name="district_en" id="exampleInputName1" placeholder="Enter Divisions English Name">
          @error('district_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name</label>
            <input type="text" class="form-control" name="district_ban" id="exampleInputName2" placeholder="Enter Divisions Bangla Name">
            @error('district_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Create</button>
        </form>
      </div>
    </div>
  </div>
@endsection