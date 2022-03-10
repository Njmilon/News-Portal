@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Prayer Setting</h4>
        <p class="card-description"> create prayer setting here </p>
        
        <form action="{{ route('prayer.link.update') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="fajr">Fojor Time</label>
            <input value="{{ $prayer->fajr }}" type="text" class="form-control" name="fajr" id="fajr">
          </div>

          <div class="form-group">
            <label for="johor">Johor Time</label>
            <input value="{{ $prayer->johor }}" type="text" class="form-control" name="johor" id="johor">
          </div>

          <div class="form-group">
            <label for="asor">Asor Time</label>
            <input value="{{ $prayer->asor }}" type="text" class="form-control" name="asor" id="asor">
          </div>

          <div class="form-group">
            <label for="magrib">Magrib Time</label>
            <input value="{{ $prayer->magrib }}" type="text" class="form-control" name="magrib" id="magrib">
          </div>

          <div class="form-group">
            <label for="esha">Esha Time</label>
            <input value="{{ $prayer->esha }}" type="text" class="form-control" name="esha" id="esha">
          </div>

          <div class="form-group">
            <label for="jummah">Jummah Time</label>
            <input value="{{ $prayer->jummah }}" type="text" class="form-control" name="jummah" id="jummah">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection