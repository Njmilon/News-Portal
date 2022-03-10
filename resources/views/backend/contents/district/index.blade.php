@extends('backend.master')

@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Division
                <a style="float: right;" href="{{ route('district.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New Divisions</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> Divisions-English </th>
                <th> Divisions-Bangla </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($districts as $key =>$row)
                    <tr>
                      
                <td> {{ $key + $districts->firstItem() }} </td>
                <td> {{ $row->district_en }} </td>
                <td> {{ $row->district_ban }} </td>
                <td>
                    
                    <a href="{{ route('district.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('district.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $districts->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection