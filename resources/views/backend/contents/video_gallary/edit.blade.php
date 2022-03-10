@extends('backend.master')
@section('admin_content')
 
<div class="content-wrapper">

 
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Video  </h4>
            
                <form class="forms-sample" action="{{ route('video.gallery.update',$edit->id) }}" method="POST">
                
                    @csrf

                <div class="form-group">
                <label for="exampleInputName1">Video Title</label>
                <input value="{{ $edit->title }}" type="text" class="form-control" id="exampleInputName1" name="title">
                </div>

                <div class="form-group">
                <label for="exampleInputName1">Embed Code </label>
                <input value="{{ $edit->embed_code }}" type="text" class="form-control" id="exampleInputName1" name="embed_code">
                </div>



                <div class="form-group">
                <label for="exampleInputName1">Video Type</label>
            <select class="form-control" name="type">

                <option value="1"> Big Video </option>
                <option value="0"> Small Video </option>
                            
            </select>
                </div>




                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            
            </form>
                        </div>
                        </div>
                    </div>





          






@endsection