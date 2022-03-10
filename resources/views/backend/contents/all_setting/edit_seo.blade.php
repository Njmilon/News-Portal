@extends('backend.master')

@section('admin_content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Seo Setting</h4>
        <p class="card-description"> create seo setting here </p>
        
        <form action="{{ route('seo.link.update') }}" method="POST"> 
            @csrf
          <div class="form-group">
            <label for="meta_author">Meta Author</label>
            <input value="{{ $seo->meta_author }}" type="text" class="form-control" name="meta_author" id="meta_author">
          </div>

          <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input value="{{ $seo->meta_title }}" type="text" class="form-control" name="meta_title" id="meta_title">
          </div>

          <div class="form-group">
            <label for="meta_keyword">Meta Keyword</label>
            <input value="{{ $seo->meta_keyword }}" type="text" class="form-control" name="meta_keyword" id="meta_keyword">
          </div>

          <div class="form-group">
            <label for="summernote1">Meta Description</label>
            <textarea name="meta_description" class="form-control" id="summernote1" rows="4">{{ $seo->meta_description }}</textarea>
          </div>

          <div class="form-group">
            <label for="summernote2">Google Analytics</label>
            <textarea name="google_analytics" class="form-control" id="summernote2" rows="4">{{ $seo->google_analytics }}</textarea>
          </div>

          <div class="form-group">
            <label for="google_verification">Google Verification</label>
            <input value="{{ $seo->google_verification }}" type="text" class="form-control" name="google_verification" id="google_verification">
          </div>

          <div class="form-group">
            <label for="summernote">Alexa Analytics</label>
            <textarea name="alexa_analytics" class="form-control" id="summernote" rows="4">{{ $seo->alexa_analytics }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection