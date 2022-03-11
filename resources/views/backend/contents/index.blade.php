@extends('backend.master')

@section('admin_content')


@php
  $category = DB::table('categories')->get();
  $subcategory = DB::table('sub_categories')->get();
  $post = DB::table('posts')->get();
  $ads = DB::table('ads')->get();
  $user = DB::table('users')->get();
@endphp


<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              <h4 class="mb-1 mb-sm-0">Welcome to Daily News Dashboard </h4>
              
            </div>
            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
              <span>
<a href=" {{ url('/') }} " target="_blank" class="btn btn-outline-light btn-rounded get-started-btn"> Visit News Portal </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($category) }}</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Category</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Total Number of Category</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($subcategory) }}</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">SubCategory</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Total Number of Subcategory</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($post) }}</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Post</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Total Number of Post</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($ads) }}</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Ads</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Total Number of Advertisement</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($user) }}</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Users</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Total Number of User</h6>
          </div>
        </div>
      </div>
    </div>
        </div>

  @endsection