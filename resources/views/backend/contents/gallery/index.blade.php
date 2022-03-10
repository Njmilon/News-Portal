@extends('backend.master')

@section('admin_content')

<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Photo Gallery
                <a style="float: right;" href="{{ route('photo.gallery.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New Photo Gallery</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> Photo Title </th>
                <th> Photo Type </th>
                <th> Image </th>
                <th> Action </th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($photos as $key=>$row)
                    <tr>
                <td> {{ $key + $photos->firstItem() }} </td>
                <td> {{ $row->title}} </td>

                <td> 
                    @if ($row->type == 1)
                        <p>Big Photo</p>
                    @else
                    <p>Small Photo</p>
                    @endif
                </td>
                <td> <img src="{{ asset($row->image) }}" style="height:50px; width:70px;"> </td>              
                <td>
                    <a href="{{ route('photo.gallery.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('photo.gallery.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $photos->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection