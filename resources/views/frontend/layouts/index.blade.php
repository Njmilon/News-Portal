@extends('frontend.frontend_master')	
    
@section('frontend_content')    

    <!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
	 <div class="service-img"><a href="{{ route('design.single.page',$firstSectionBig->id) }}"><img src="{{ asset($firstSectionBig->image) }}" width="800px" alt="Notebook"></a></div>
								<div class="content">
		 <h4 class="lead-heading-01"><a href="{{ route('design.single.page',$firstSectionBig->id) }}">
		@if (session()->get('language') == 'bangla')
			{{ $firstSectionBig->title_ban }}
		@else
			{{ $firstSectionBig->title_en }}
		@endif
		</a> </h4>
								</div>
							</div>
						</div>
					</div>

						<div class="row">
							@foreach ($firstSection as $row)
								<div class="col-md-3 col-sm-3">
									<div class="top-news">
										<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="#">
										@if (session()->get('language') == 'bangla')
											{{ $row->title_ban }}
										@else
											{{ $row->title_en }}
										@endif	
										</a> </h4>
									</div>
								</div>
							@endforeach
								
						</div>
@php
$horizontalads = DB::table('ads')->where('type',1)->first();
@endphp					

					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add">
								@if ($horizontalads == NULL)
										
								@else
									<a href="{{ $horizontalads->link }}" target="_blank"><img src="{{ asset($horizontalads->image) }}"/></a> 
								@endif		
							</div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- news-start -->
{{-- first category --}}					
					<div class="row">

						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
									@if (session()->get('language') == 'bangla')
											{{ $firstcategory->category_ban }}
										@else
											{{ $firstcategory->category_en }}
										@endif	 
									<span>
										@if (session()->get('language') == 'bangla')
										আরও
										@else
										More
										@endif
									 
									<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('design.single.page',$firstcatbigthum->id) }}"><img src="{{ asset($firstcatbigthum->image) }}" alt="Notebook"></a>
												<h4 class="heading-02"><a href="#">
													@if (session()->get('language') == 'bangla')
														{{ $firstcatbigthum->title_ban }}
													@else
														{{ $firstcatbigthum->title_en }}
													@endif	
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach ($firstcatsmallthum as $row)
											<div class="image-title">
											<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">
												@if (session()->get('language') == 'bangla')
														{{ $row->title_ban }}
													@else
														{{ $row->title_en }}
													@endif		
											</a> </h4>
										</div>
										@endforeach
										
										
									</div>
								</div>
							</div>
						</div>

{{-- second category --}}
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
									@if (session()->get('language') == 'bangla')
											{{ $secondcategory->category_ban }}
										@else
											{{ $secondcategory->category_en }}
										@endif	
									<span>
										@if (session()->get('language') == 'bangla')
										আরও
										@else
										More
										@endif

									<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="#"><img src="{{ asset($secondcatbigthum->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ route('design.single.page',$secondcatbigthum->id) }}">
											@if (session()->get('language') == 'bangla')
												{{ $secondcatbigthum->title_ban }}
											@else
												{{ $secondcatbigthum->title_en }}
											@endif	
											</a> </h4>
										</div>									
								</div>
									
									<div class="col-md-6 col-sm-6">
										@foreach ($secondcatsmallthum as $row)
											<div class="image-title">
											<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">
												@if (session()->get('language') == 'bangla')
												{{ $row->title_ban }}
											@else
												{{ $row->title_en }}
											@endif		
											</a> </h4>
										</div>
										@endforeach
										
										
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>

@php
$verticalads = DB::table('ads')->where('type',0)->skip(1)->first();
@endphp

				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								@if ($verticalads == NULL)
									
								@else
									<a href="{{ $verticalads->link }}" target="_blank"><img src="{{ asset($verticalads->image) }}"/></a> 
								@endif
								
							</div>
						</div>
					</div>
					<!-- /.add-close -->	
					
					<!-- youtube-live-start -->
					@if ($liveTvs->status==1)
						<div class="cetagory-title-03">
							@if (session()->get('language') == 'bangla')
								সরাসরি সম্প্রচার
							@else
								Live TV
							@endif
						
						</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
							{!! $liveTvs->embed_code !!}
						</div>
					</div>
					@endif	
					<!-- /.youtube-live-close -->	
					
					<!-- facebook-page-start -->
					<div class="cetagory-title-03">Facebook </div>
					<div id="fb-root"></div>
					<div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="CDgzAZe6"></script>
					<div class="fb-page" data-href="https://www.facebook.com/The-Demo-Company-106138102024591" data-tabs="" data-width="280" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/The-Demo-Company-106138102024591" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/The-Demo-Company-106138102024591">The Demo Company</a></blockquote></div>

@php
$verticalads1 = DB::table('ads')->where('type',0)->skip(2)->first();
@endphp
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								@if ($verticalads1 == NULL)
									
								@else
									<a href="{{ $verticalads1->link }}" target="_blank"><img src="{{ asset($verticalads1->image) }}"/></a> 
								@endif
							</div>
						</div>
					</div><!-- /.add-close -->	
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->



	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
{{-- third category --}}
			@php
				$thirdcategory = DB::table('categories')->skip(2)->first();
				$thirdcatbigthum = DB::table('posts')->where('category_id',$thirdcategory->id)->where('bigthumbnail',1)->first();
				$thirdcatsmallthum = DB::table('posts')->where('category_id',$thirdcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
			@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
							@if (session()->get('language') == 'bangla')
								{{ $thirdcategory->category_ban }}
							@else
								{{ $thirdcategory->category_en }}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
							@if (session()->get('language') == 'bangla')
								সব খবর
							@else
								All News
							@endif  
							</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									
									<a href="{{ route('design.single.page',$thirdcatbigthum->id) }}"><img src="{{ asset($thirdcatbigthum->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ route('design.single.page',$thirdcatbigthum->id) }}">
										
										@if (session()->get('language') == 'bangla')
												{{ $thirdcatbigthum->title_ban }}
										@else
												{{ $thirdcatbigthum->title_en }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								
								@foreach ($thirdcatsmallthum as $row)
									
									<div class="image-title">
									<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">						
										@if (session()->get('language') == 'bangla')
										{{ $row->title_ban }}
									@else
										{{ $row->title_en }}
									@endif	
									</a> </h4>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>

{{-- forth category --}}
			@php
				$forthcategory = DB::table('categories')->skip(3)->first();
				$forthcatbigthum = DB::table('posts')->where('category_id',$forthcategory->id)->where('bigthumbnail',1)->first();
				$forthcatsmallthum = DB::table('posts')->where('category_id',$forthcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
			@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
							@if (session()->get('language') == 'bangla')
								{{ $forthcategory->category_ban }}
							@else
								{{ $forthcategory->category_en }}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
							@if (session()->get('language') == 'bangla')
								সব খবর
							@else
								All News
							@endif  
							</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									
									<a href="{{ route('design.single.page',$forthcatbigthum->id) }}"><img src="{{ asset($forthcatbigthum->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ route('design.single.page',$forthcatbigthum->id) }}">
										
										@if (session()->get('language') == 'bangla')
												{{ $forthcatbigthum->title_ban }}
										@else
												{{ $forthcatbigthum->title_en }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								
								@foreach ($forthcatsmallthum as $row)
									
									<div class="image-title">
									<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">						
										@if (session()->get('language') == 'bangla')
										{{ $row->title_ban }}
									@else
										{{ $row->title_en }}
									@endif	
									</a> </h4>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ******* -->

{{-- fifth category --}}
			<div class="row">
				@php
				$fifthcategory = DB::table('categories')->skip(4)->first();
				$fifthcatbigthum = DB::table('posts')->where('category_id',$fifthcategory->id)->where('bigthumbnail',1)->first();
				$fifthcatsmallthum = DB::table('posts')->where('category_id',$fifthcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
			@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
							@if (session()->get('language') == 'bangla')
								{{ $fifthcategory->category_ban }}
							@else
								{{ $fifthcategory->category_en }}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
							@if (session()->get('language') == 'bangla')
								সব খবর
							@else
								All News
							@endif  
							</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									
									<a href="{{ route('design.single.page',$fifthcatbigthum->id) }}"><img src="{{ asset($fifthcatbigthum->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ route('design.single.page',$fifthcatbigthum->id) }}">
										
										@if (session()->get('language') == 'bangla')
												{{ $fifthcatbigthum->title_ban }}
										@else
												{{ $fifthcatbigthum->title_en }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								
								@foreach ($fifthcatsmallthum as $row) 
									
									<div class="image-title">
									<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">						
										@if (session()->get('language') == 'bangla')
										{{ $row->title_ban }}
									@else
										{{ $row->title_en }}
									@endif	
									</a> </h4>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
{{-- six category more start--}}
				@php
				$sixcategory = DB::table('categories')->skip(5)->first();
				$sixcatbigthum = DB::table('posts')->where('category_id',$sixcategory->id)->where('bigthumbnail',1)->first();
				$sixcatsmallthum = DB::table('posts')->where('category_id',$sixcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
			@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
							@if (session()->get('language') == 'bangla')
								{{ $sixcategory->category_ban }}
							@else
								{{ $sixcategory->category_en }}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
							@if (session()->get('language') == 'bangla')
								সব খবর
							@else
								All News
							@endif  
							</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									
									<a href="{{ route('design.single.page',$sixcatbigthum->id) }}"><img src="{{ asset($sixcatbigthum->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ route('design.single.page',$sixcatbigthum->id) }}">
										
										@if (session()->get('language') == 'bangla')
												{{ $sixcatbigthum->title_ban }}
										@else
												{{ $sixcatbigthum->title_en }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								
								@foreach ($sixcatsmallthum as $row)
									
									<div class="image-title">
									<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">						
										@if (session()->get('language') == 'bangla')
										{{ $row->title_ban }}
									@else
										{{ $row->title_en }}
									@endif	
									</a> </h4>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>
{{-- category news end --}}

@php
$horizontalads1 = DB::table('ads')->where('type',1)->skip(3)->first();
$horizontalads2 = DB::table('ads')->where('type',1)->skip(4)->first();
@endphp	
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add">
						@if ($horizontalads1 == NULL)
										
						@else
							<a href="{{ $horizontalads1->link }}" target="_blank"><img src="{{ asset($horizontalads1->image) }}"/></a> 
						@endif
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add">
						@if ($horizontalads2 == NULL)
										
						@else
							<a href="{{ $horizontalads2->link }}" target="_blank"><img src="{{ asset($horizontalads2->image) }}"/></a> 
						@endif
					</div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">

			@php
				$sevencategory = DB::table('categories')->skip(6)->first();
				$sevencatbigthum = DB::table('posts')->where('category_id',$sevencategory->id)->where('bigthumbnail',1)->first();
				$sevencatsmallthum = DB::table('posts')->where('category_id',$sevencategory->id)->where('bigthumbnail',NULL)->limit(6)->get();
			@endphp

				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="#">
						@if (session()->get('language') == 'bangla')
									{{ $sevencategory->category_ban }}
									@else
									{{ $sevencategory->category_en }}
									@endif	 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						
						<span><i class="fa fa-plus" aria-hidden="true"></i> 
							@if (session()->get('language') == 'bangla')
									সব খবর
									@else
									All News
									@endif   
						</span></a></div>
					
					<div class="row">
						
						<div class="col-md-4 col-sm-4">
							
								<div class="top-news">
								<a href="{{ route('design.single.page',$sevencatbigthum->id) }}"><img src="{{ asset($sevencatbigthum->image)}}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="{{ route('design.single.page',$sevencatbigthum->id) }}">
									@if (session()->get('language') == 'bangla')
									{{ $sevencatbigthum->title_ban }}
									@else
									{{ $sevencatbigthum->title_en }}
									@endif 

								</a> </h4>
							</div>
							
							
						</div>

						<div class="col-md-6 col-sm-6">
								
							@foreach ($sevencatsmallthum as $row)
								
								<div class="image-title">
								<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">						
									@if (session()->get('language') == 'bangla')
									{{ $row->title_ban }}
								@else
									{{ $row->title_en }}
								@endif	
								</a> </h4>
							</div>
							@endforeach
							
						</div>
						
					</div>
					<!-- ******* -->
					<br />
{{-- entertainment --}}
@php
$lastcategory = DB::table('categories')->skip(7)->first();
$lastcatbigthum = DB::table('posts')->where('category_id',$lastcategory->id)->where('bigthumbnail',1)->first();
$lastcatsmallthum = DB::table('posts')->where('category_id',$lastcategory->id)->where('bigthumbnail',NULL)->limit(6)->get();
@endphp

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">
								@if (session()->get('language') == 'bangla')
								{{ $lastcategory->category_ban }}
								@else
								{{ $lastcategory->category_en }}
								@endif	 
							<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="{{ route('design.single.page',$lastcatbigthum->id) }}"><img src="{{ asset($lastcatbigthum->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ route('design.single.page',$lastcatbigthum->id) }}">
									@if (session()->get('language') == 'bangla')
										{{ $lastcatbigthum->title_ban }}
									@else
										{{ $lastcatbigthum->title_en }}
									@endif 
		
									</a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
								
							@foreach ($lastcatsmallthum as $row)
								
								<div class="image-title">
								<a href="{{ route('design.single.page',$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">						
									@if (session()->get('language') == 'bangla')
									{{ $row->title_ban }}
								@else
									{{ $row->title_en }}
								@endif	
								</a> </h4>
							</div>
							@endforeach
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="assets/img/top-ad.jpg" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	


				</div>
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
								@if (session()->get('language') == 'bangla')
									সর্বশেষ
								@else
									Latest
								@endif	
							</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
								@if (session()->get('language') == 'bangla')
									জনপ্রিয়
								@else
									Popular
								@endif	
							</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
								@if (session()->get('language') == 'bangla')
								স্পটলাইট
								@else
								Spotlight
								@endif
							</a></li>
						</ul>

@php
	$latest = DB::table('posts')->orderBy('id','desc')->limit(8)->get();
	// dd($latest);
	$popular = DB::table('posts')->inRandomOrder()->limit(8)->get();
	$spotlight = DB::table('posts')->orderBy('id')->inRandomOrder()->limit(8)->get();
@endphp
						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									
										<div class="news-title-02">
											@foreach ($latest as $row)
										<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">
										@if (session()->get('language') == 'bangla')
											{{ $row->title_ban }}
										@else
											{{ $row->title_en }}
										@endif		
										</a> </h4>
										@endforeach
										</div>
									
									

								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									<div class="news-title-02">
										@foreach ($popular as $row)
									<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">
									@if (session()->get('language') == 'bangla')
										{{ $row->title_ban }}
									@else
										{{ $row->title_en }}
									@endif		
									</a> </h4>
									@endforeach
									</div>
									
								</div>                                          
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									<div class="news-title-02">
										@foreach ($spotlight as $row)
									<h4 class="heading-03"><a href="{{ route('design.single.page',$row->id) }}">
									@if (session()->get('language') == 'bangla')
										{{ $row->title_ban }}
									@else
										{{ $row->title_en }}
									@endif		
									</a> </h4>
									@endforeach
									</div>
									
								</div>						                                          
							</div>
						</div>
					</div>
					<!-- Namaj Times -->
					<div class="cetagory-title-03"> 
						@if (session()->get('language') == 'bangla')
							নামাজের সময়
						@else
							Prayer Time 
						@endif
					</div>

					<table class="table">
						<tr>
							<th scope="col">
								@if (session()->get('language') == 'bangla')
								ফজর
								@else
								Fajar 
								@endif
							</th>
							<th scope="col">{{ $prayer->fajr }}</th>
						</tr>
						<tr>
							<th scope="col">
								@if (session()->get('language') == 'bangla')
								জোহর
								@else
								Johor 
								@endif
							</th>
							<th scope="col">{{ $prayer->johor }}</th>
						</tr>
						<tr>
							<th scope="col">
								@if (session()->get('language') == 'bangla')
								আসর
								@else
								Asor
								@endif
							</th>
							<th scope="col">{{ $prayer->asor }}</th>
						</tr>
						<tr>
							<th scope="col">
								@if (session()->get('language') == 'bangla')
								মাগরিব
								@else
								Magrib 
								@endif
							</th>
							<th scope="col">{{ $prayer->magrib }}</th>
						</tr>
						<tr>
							<th scope="col">
								@if (session()->get('language') == 'bangla')
								এশা
								@else
								Esha 
								@endif
							</th>
							<th scope="col">{{ $prayer->esha }}</th>
						</tr>
						<tr>
							<th scope="col">
								@if (session()->get('language') == 'bangla')
								জুম্মা
								@else
								Jummah 
								@endif
							</th>
							<th scope="col">{{ $prayer->jummah }}</th>
						</tr>
					</table>
					<!-- Namaj Times -->
					<div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div>
				   </form>
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04"> 
					@if (session()->get('language') == 'bangla')
								গুরুত্বপূর্ণ ওয়েবসাইট
								@else
								Important Website
								@endif   
					
					</div>
				  
					   
				<div class="news-title-02">
					@foreach ($websites as $row)
				   		<h4 class="heading-03"><a href="{{ $row->website_link }}" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> {{ $row->website_title }}  </a> </h4>
					 @endforeach
				</div>
					 
				   
				   	
				   

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	


	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> 
						@if (session()->get('language') == 'bangla')
								ফটো গ্যালারি
								@else
								Photo Gallery 
								@endif 
						
					</div>

@php
	$bigphoto = DB::table('galleries')->where('type',1)->orderBy('id','desc')->first();
	$smallphoto = DB::table('galleries')->where('type',0)->orderBy('id','desc')->limit(10)->get();
@endphp
					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{ asset($bigphoto->image) }}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            <div class="photo_img photo_border active">
								@foreach ($smallphoto as $row)
									 <img src="{{ asset($row->image) }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    {{ $row->title }}
	                                </div>
								@endforeach
	                            
	                               
	                            </div>

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> 
						@if (session()->get('language') == 'bangla')
								ভিডিও সংগ্রহশালা
								@else
								Video Gallery
								@endif  
					</div>

@php
$bigvideo = DB::table('videogalaries')->where('type',1)->orderBy('id','desc')->first();
$smallvideo = DB::table('videogalaries')->where('type',0)->orderBy('id','desc')->limit(3)->get();
@endphp
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
										{!! $bigvideo->embed_code !!}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">
 @foreach($smallvideo as $row)
     <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
   {!! $row->embed_code !!}
                                </div>
     @endforeach
                               

                            </div>
                        </div>
                    </div>



                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->

    @endsection