@extends('backend.master')

@section('admin_content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Create New Advertisement</h4>

                                {{-- Form --}}

        <form class="forms-sample" action="{{ route('all.ads.create') }}" method="POST" enctype="multipart/form-data">

          @csrf

                                {{-- Link --}}
        <div class="row">       
            <div class="form-group col-md">
                <label for="link"> Ads Link </label>
                <input value="{{ old('link') }}" name="link" type="text" class="form-control" id="link" placeholder="Enter Link">
              </div>
        </div> 
   
                            {{-- type --}}
                               
        <div class="row">       
              <div class="form-group col-md">
                <label for="type">Ads Type</label>
                <select name="type" class="form-control" id="type">
                 <option value="0">Vertical Ads</option>
                 <option value="1">Horizontal Ads</option>
                </select>
              </div>
        </div>


   


                                      {{-- Image --}}
          <div class="mb-3">
              <label for="image" class="form-label">Ads Image</label>
              <input required type="file" name="image" class="form-control" id="image">
            </div>

          <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>



 


@endsection