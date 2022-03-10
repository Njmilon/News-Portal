@extends('backend.master')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Create New Photo Gallery</h4>

                                {{-- Form --}}

        <form class="forms-sample" action="{{ route('photo.gallery.create') }}" method="POST" enctype="multipart/form-data">

          @csrf

                                {{-- Title --}}
        <div class="row">       
            <div class="form-group col-md">
                <label for="exampleInputName1"> Title * </label>
                <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Title Name">               
                @error('title')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
        </div> 
   
                            {{-- type --}}
                               
        <div class="row">       
              <div class="form-group col-md">
                <label for="subdistrict_id">Type *</label>
                <select name="type" class="form-control" id="subdistrict_id">
                 <option value="1">Big Photo</option>
                 <option value="0">Small Photo</option>
                </select>
              </div>
        </div>


   


                                      {{-- Image --}}
          <div class="mb-3">
              <label for="image" class="form-label">Image *</label>
              <input value="{{ old('image') }}" required type="file" name="image" class="form-control" id="image">
             
              @error('image')
                <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>

          <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>





 


@endsection