@extends('backend.master')

@section('admin_content')

<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Advertisement
                <a style="float: right;" href="{{ route('all.ads.create.index') }}">
                    <button class="btn btn-info btn-rounded btn-fw">+ New Ads</button> 
                </a>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> SL </th>
                <th> Ads Link </th>
                <th> Ads Type </th>
                <th> Ads Image </th>
                <th> Action </th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($allads as $key=>$row)
            <tr>
                <td> {{ $key+1 }} </td>
                <td> {{ $row->link}} </td>

                <td> 
                    @if ($row->type == 1)
                        <span class="badge badge-success">Horizontal Ads</span>
                    @else
                        <span class="badge badge-info">Vertical Ads</span>
                    @endif
                </td>
                <td> <img src="{{ asset($row->image) }}" style="width: 100px; height: 80px;"> </td>            
                <td>
                    <a href="{{ route('single.ads.delete',$row->id) }}"><button type="button" class="btn btn-danger btn-icon-text">
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