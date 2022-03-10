@extends('backend.master')

@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub-Category
                <a style="float: right;" href="{{ route('subcategory.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New SubCategory</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> SubCategory-English </th>
                <th> SubCategory-Bangla </th>
                <th> Category Name </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $row)
              <tr>
                <td> {{ $subcategories->FirstItem()+$loop->index }} </td>
                <td> {{ $row->subcategory_en }} </td>
                <td> {{ $row->subcategory_ban }} </td>
                <td> {{ $row->category_en }} | {{ $row->category_ban }} </td>
                <td>

                    <a href="{{ route('subcategory.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('subcategory.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $subcategories->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection