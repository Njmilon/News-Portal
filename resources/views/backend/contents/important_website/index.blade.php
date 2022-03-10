@extends('backend.master')

@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Important Website
                <a style="float: right;" href="{{ route('website.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New Important Website</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> website title </th>
                <th> website link </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($websites as $key=>$row)
                    <tr>
                <td> {{ $key + $websites->firstItem() }} </td>
                <td> {{ $row->website_title }} </td>
                <td> {{ $row->website_link }} </td>
                <td>
                    <a href="{{ route('website.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('website.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $websites->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection