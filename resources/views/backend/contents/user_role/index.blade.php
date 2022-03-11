@extends('backend.master')

@section('admin_content')

<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User
                <a style="float: right;" href="{{ route('create.role.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New User</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> Name </th>
                <th> Email </th>
                <th> Role </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$row)
                    <tr>
                <td> {{ $key+1 }} </td>
                <td> {{ $row->name }} </td>
                <td> {{ $row->email }} </td>
                <td> 
                    @if ($row->category == 1)
                    <span class="badge badge-success">Category</span>
                    @else
                    @endif
                    
                    @if ($row->division == 1)
                    <span class="badge badge-primary">Division</span>
                    @else
                    @endif

                    @if ($row->post == 1)
                    <span class="badge badge-warning">Post</span>
                    @else
                    @endif

                    @if ($row->setting == 1)
                    <span class="badge badge-danger">Setting</span>
                    @else
                    @endif

                    @if ($row->website == 1)
                    <span class="badge badge-success">Website</span>
                    @else
                    @endif

                    @if ($row->gallery == 1)
                    <span class="badge badge-primary">Gallery</span>
                    @else
                    @endif

                    @if ($row->advertisement == 1)
                    <span class="badge badge-warning">Ads</span>
                    @else
                    @endif

                    @if ($row->role == 1)
                    <span class="badge badge-danger">Role</span>
                    @else
                    @endif
                </td>
                <td>
                    <a href="{{ route('edit.user.role',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href=""><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection