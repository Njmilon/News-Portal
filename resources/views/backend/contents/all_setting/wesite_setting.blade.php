@extends('backend.master')

@section('admin_content')

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Website Setting</h4>
        
        <form action="{{ route('website.setting.link.store') }}" method="POST" enctype="multipart/form-data"> 
            
            @csrf

          <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ $setting->email }}" type="email" class="form-control" name="email" id="email">
          </div>

          <div class="form-group">
            <label for="phone_no">Phone-No</label>
            <input value="{{ $setting->phone_no }}" type="number" class="form-control" name="phone_no" id="phone_no">
          </div>

          <div class="form-group">
            <label for="hotline_no">Hotline-No</label>
            <input value="{{ $setting->hotline_no }}" type="number" class="form-control" name="hotline_no" id="hotline_no">
          </div>

          <div class="form-group">
            <label for="summernote1">Address English</label>
            <textarea name="address_en" class="form-control" id="summernote1" rows="4">{{ $setting->address_en }}</textarea>
          </div>

          <div class="form-group">
            <label for="summernote2">Address Bangla</label>
            <textarea name="address_ban" class="form-control" id="summernote2" rows="4">{{ $setting->address_ban }}</textarea>
          </div>
                                {{-- Add New Image --}}
          <div class="mb-3"> 
            <label for="header_logo" class="form-label">Header Logo</label>
            <input required type="file" name="header_logo" class="form-control" id="header_logo">
          </div>
                                  {{-- Existing Image --}}
          <div class="mb-3">
              <label class="form-label">Existing Header Logo</label>
              <input type="hidden" name="headeroldlogo">
              <br>
              <img src="{{ asset($setting->header_logo) }}" style="height: 100px; width: 100px;">
            </div>
                                {{-- Add New Image --}}
            <div class="mb-3">
                <label for="footer_logo" class="form-label">Footer Logo</label>
                <input required type="file" name="footer_logo" class="form-control" id="footer_logo">
              </div>
                                      {{-- Existing Image --}}
              <div class="mb-3">
                  <label class="form-label">Existing Footer Logo</label>
                  <input type="hidden" name="footeroldlogo">
                  <br>
                  <img src="{{ asset($setting->footer_logo) }}" style="height: 100px; width: 100px;">
                </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection