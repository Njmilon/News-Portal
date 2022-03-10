@extends('backend.master')

@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">News Posts
                <a style="float: right;" href="{{ route('news.post.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New Post</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> Title English </th>
                <th> Title Bangla </th>
                <th> Image </th>
                <th> Category </th>
                <th> SubCategory </th>
                <th> District </th>
                <th> SubDistrict </th>
                <th> Tags </th>
                <th> Details English </th>
                <th> Details Bangla </th>
                <th> Headline </th>
                <th> First Section </th>
                <th> First Section BigThumbnail </th>                
                <th> General Big Thumbnail </th>
                <th> Created_By </th>
                <th> Created_At </th>
                <th> Updated_At </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                    <tr>
                <td> {{ $key + $data->firstItem() }} </td>
                <td> {{ $row->title_en }} </td>
                <td> {{ $row->title_ban }} </td>
                <td> <img src="{{ asset($row->image) }}" style="height:50px; width:70px;"> </td>
                <td> {{ $row->category_en }} | {{ $row->category_ban }} </td>
                <td> {{ $row->subcategory_en }} | {{ $row->subcategory_ban }} </td>
                <td> {{ $row->district_en }} | {{ $row->district_ban }} </td>
                <td> {{ $row->subdistrict_en }} | {{ $row->subdistrict_ban }} </td>
                <td> {{ $row->tags_en }} | {{ $row->tags_ban }} </td>
                <td> {{ Str::limit($row->details_en,50) }} </td>
                <td> {{ Str::limit($row->details_ban,50) }} </td>
                <td> {{ $row->headline }} </td>
                <td> {{ $row->first_section }} </td>
                <td> {{ $row->first_section_thumbnail }} </td>
                <td> {{ $row->bigthumbnail }} </td>
                <td> {{ $row->name }} </td> 
                <td> {{ $row->created_at }} </td>
                <td> {{ $row->updated_at }} </td>

                <td>
                    <a href="{{ route('news.post.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('news.post.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $data->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection