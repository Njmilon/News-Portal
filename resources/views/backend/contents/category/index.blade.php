@extends('backend.master')

@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category
                <a style="float: right;" href="{{ route('category.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New Category</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> Category-English </th>
                <th> Category-Bangla </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                <td> {{ $categories->FirstItem()+$loop->index }} </td>
                <td> {{ $category->category_en }} </td>
                <td> {{ $category->category_ban }} </td>
                <td>
                   {{-- <a href=""><button type="button" class="btn btn-primary btn-icon-text">Edit<i class="mdi mdi-file-check btn-icon-append"></i>
                    </button>
                    </a> --}}
                    <a href="{{ route('category.edit',$category->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('category.delete',$category->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $categories->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection