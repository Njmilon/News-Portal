@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit District</h4>
        <p class="card-description"> edit district info </p>

      <form action="{{ route('subdistrict.update',$edit->id) }}" method="POST">
            @csrf

            {{-- get subdistrict table data here --}}
          <div class="form-group">
            <label for="exampleInputName1">English Name *</label>
            <input type="text" value="{{ $edit->subdistrict_en }}" class="form-control"  name="subdistrict_en" id="exampleInputName1" placeholder="Enter English Name">
            @error('subdistrict_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName2">Bangla Name *</label>
            <input type="text" value="{{ $edit->subdistrict_ban }}" class="form-control" name="subdistrict_ban" id="exampleInputName2" placeholder="Enter Bangla Name">
            @error('subdistrict_ban')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>

          {{-- get district table data here --}}
          <div class="form-group">
            <label for="exampleFormControlSelect2">Select Divisions</label>
            <select class="form-control" name="district_id" id="exampleFormControlSelect2">

                @foreach ($districts as $row)
                    <option value="{{ $row->id }}" @if ( $row->id == $edit->district_id)
                      selected @endif >

                      {{ $row->district_en }} | {{ $row->district_ban }}
                    </option>
                @endforeach
             
            </select>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
      </form>
      </div>
    </div>
  </div>
@endsection