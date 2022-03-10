@extends('backend.master')
@section('admin_content')
 
<div class="content-wrapper">

 



<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Video Gallery
                        <a style="float: right;" href="{{ route('video.gallery.create.index') }}">
                            <button class="btn btn-info btn-rounded btn-fw">+ New Photo Gallery</button> 
                        </a>    
                    </h4>
      
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Video Title </th>
                            <th> Type </th>
                            <th> Action </th>
                             
                          </tr>
                        </thead>
                        <tbody>
              
           @foreach($video as $key=>$row)
      <tr>
        <td> {{ $key + $video->firstItem() }} </td>
        <td> {{ $row->title }} </td>
         
        <td> 
        @if($row->type == 1)
        <span class="badge badge-success">Big Video</span>
        @else
        <span class="badge badge-info">Small Video</span>
        @endif 
         </td> 

        <td> 
    <a href="{{ route('video.gallery.edit',$row->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('video.gallery.delete',$row->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>

         </td>
      </tr>
      @endforeach
                           
                        </tbody>
                      </table>
                      {{ $video->links() }}
                    </div>
                  </div>
                </div>
              </div>


 






@endsection