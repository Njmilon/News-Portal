@extends('backend.master')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Edit News Post</h4>

                                {{-- Form --}}

        <form class="forms-sample" action="{{ route('news.post.update',$post->id) }}" method="POST" enctype="multipart/form-data">

          @csrf

                                {{-- Title --}}
        <div class="row">       
            <div class="form-group col-md-6">
                <label for="exampleInputName1">Title English *</label>
                <input value="{{ $post->title_en }}" name="title_en" type="text" class="form-control" id="exampleInputName1" placeholder="Title English Name">
                
                @error('title_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

            <div class="form-group col-md-6">
                <label for="exampleInputName2">Title Bangla *</label>
                <input value="{{ $post->title_ban }}" name="title_ban" type="text" class="form-control" id="exampleInputName2" placeholder="Title Bangla Name">
                
                @error('title_ban')
                  <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
        </div> 

                            {{-- Tags --}}
        <div class="row">       
            <div class="form-group col-md-6">
                <label for="Tags1">Tags English</label>
                <input value="{{ $post->tags_en }}" name="tags_en" type="text" class="form-control" id="Tags1" placeholder="Tags English Name">
            </div>
            <div class="form-group col-md-6">
                <label for="Tags2">Tags Bangla</label>
                <input value="{{ $post->tags_ban }}" name="tags_ban" type="text" class="form-control" id="Tags2" placeholder="Tags Bangla Name">
            </div>
        </div> 

                          {{-- Category & SubCategory --}}
        <div class="row">      
              <div class="form-group col-md-6">
                <label for="exampleInputName1">Category *</label>
                 <select class="form-control" id="exampleSelectGender" name="category_id">
             <option disabled="" selected="">--Select Category--</option>
                          @foreach($category as $row)
            <option value="{{ $row->id }}"
            <?php if ($row->id == $post->category_id) {
              echo "selected"; } ?> >{{ $row->category_en }} | {{ $row->category_ban }} </option>
                          @endforeach
                                  </select>
              </div>
          

              <div class="form-group col-md-6">
                <label for="subcategory_id">Sub_Category</label>
                <select name="subcategory_id" class="form-control" id="subcategory_id">
                  @foreach($subcategory as $row)
                        <option value="{{ $row->id }}"
                        <?php if ($row->id == $post->subcategory_id) {
                            echo "selected"; } ?> >{{ $row->subcategory_en }} | {{ $row->subcategory_ban }} </option>
                @endforeach
                </select>
              </div>
        </div> 


                                  {{-- District & SubDistrict --}}
        <div class="row">       
            <div class="form-group col-md-6">
                <label for="district_id">District *</label>
                <select name="district_id" class="form-control" id="district_id">
                    <option hidden selected>Select District</option>
                    @foreach ($district as $row)
                    <option value="{{ $row->id }}"
                        <?php if ($row->id == $post->district_id) {
                            echo "selected"; } ?> >{{ $row->district_en }} | {{ $row->district_ban }} </option>
                    @endforeach
                  
                </select>
                
                @error('district_id')
                  <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

              <div class="form-group col-md-6">
                <label for="subdistrict_id">Sub_District</label>
                <select name="subdistrict_id" class="form-control" id="subdistrict_id">
                    <option hidden selected>Select SubDistrict</option>
                    @foreach ($subdistrict as $row)
                    <option value="{{ $row->id }}"
                        <?php if ($row->id == $post->subdistrict_id) {
                            echo "selected"; } ?> >{{ $row->subdistrict_en }} | {{ $row->subdistrict_ban }} </option>
                    @endforeach
                </select>
              </div>
        </div>


                                {{-- Details en & Details ban --}}
        <div class="form-group">
            <label for="summernote">Details English</label>
            <textarea value="{{ $post->details_en }}" name="details_en" class="form-control" id="summernote" rows="4">{{ $post->details_en }}</textarea>
          </div>
          
          <div class="form-group">
            <label for="summernote1">Details Bangla</label>
            <textarea value="{{ $post->details_ban }}" name="details_ban" class="form-control" id="summernote1" rows="4">{{ $post->details_ban }}</textarea>
          </div>


                                      {{-- Image --}}
          <div class="mb-3">
              <label for="image" class="form-label">Image *</label>
              <input required type="file" name="image" class="form-control" id="image">
             
              @error('image')
                <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
                                    {{-- Existing Image --}}
            <div class="mb-3">
                <label for="old_image" class="form-label">Existing Image</label>
                {{-- <input required type="hidden" name="old_image" class="form-control" id="old_image"> --}}
                <input type="hidden" name="oldimage" value="{{ $post->image }}">
                <br>
                <img src="{{ asset($post->image) }}" style="height: 100px; width: 100px;">
               
             
  
              </div>
              <br>


                                  {{-- Check Box --}}
          <div class="form-group">
                  <label class="form-label">Extra Option</label>               
                    <div class="form-check form-check-success">
                      <label class="form-check-label">
                        <input @if ($post->headline == 1)
                            {{ "checked" }}
                        @endif 
                        type="checkbox" class="form-check-input" name="headline" value="1" > Headline <i class="input-helper"></i></label>
                    </div>
                  
                 
                    <div class="form-check form-check-success">
                      <label class="form-check-label">
                        <input @if ($post->bigthumbnail == 1)
                        {{ "checked" }}
                    @endif type="checkbox" class="form-check-input" name="bigthumbnail" id="membershipRadios2" value="1"> General Big Thumbnail <i class="input-helper"></i></label>
                    </div>
                 
                 
                    <div class="form-check form-check-success">
                      <label class="form-check-label">
                        <input @if ($post->first_section == 1)
                        {{ "checked" }}
                    @endif type="checkbox" class="form-check-input" name="first_section" id="membershipRadios2" value="1"> First Section <i class="input-helper"></i></label>
                    </div>       

                  
                    <div class="form-check form-check-success">
                      <label class="form-check-label">
                        <input @if ($post->first_section_thumbnail == 1)
                        {{ "checked" }}
                    @endif type="checkbox" class="form-check-input" name="first_section_thumbnail" id="membershipRadios2" value="1"> First Section BigThumbnail <i class="input-helper"></i></label>
                    </div>                                  
              </div>
        
          <button type="submit" class="btn btn-primary mr-2 mt-2">Update</button>
        </form>
      </div>
    </div>
  </div>


{{-- Subcategory json code  --}}
  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/get/subcategory/') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subcategory_id").empty();
                               $.each(data,function(key,value){
                                   $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+' | '+value.subcategory_ban+'</option>');
                               });
                      },
                     
                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>



 
{{-- Subdistrict json code  --}}
<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/get/subdistrict/') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       $("#subdistrict_id").empty();
                             $.each(data,function(key,value){
                                 $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+' | '+value.subdistrict_ban+'</option>');
                             });
                    },
                   
                });
            } else {
                alert('danger');
            }
        });
    });
</script>


@endsection