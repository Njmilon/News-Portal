@extends('backend.master')

@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">District
                <a style="float: right;" href="{{ route('subdistrict.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New District</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> District-English </th>
                <th> District-Bangla </th>
                <th> Divisions Name </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subdistricts as $key=>$row)
              <tr>
                <td> {{ $key + $subdistricts->firstItem() }} </td>
                <td> {{ $row->subdistrict_en }} </td>
                <td> {{ $row->subdistrict_ban }} </td>
                <td> {{ $row->district_en }} | {{ $row->district_ban }} </td>
                <td>

                    <a href="{{ route('subdistrict.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-append"></i> edit </button>
                    </a> 

                    <a href="{{ route('subdistrict.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> Delete </button>
                    </a> 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {!! $subdistricts->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection