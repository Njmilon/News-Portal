@extends('frontend.frontend_master')	
    
@section('frontend_content') 

<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">   
                   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
                    <li><a href="#">
                    @if (session()->get('language') == 'bangla')
                        {{ $singlepost->category_ban }}
                    @else
                        {{ $singlepost->category_en }}
                    @endif    
                    </a></li>
                    <li><a href="#">
                    @if (session()->get('language') == 'bangla')
                        {{ $singlepost->subcategory_ban }}
                    @else
                        {{ $singlepost->subcategory_en }}
                    @endif     
                    </a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"> 											
                <header class="headline-header margin-bottom-10">
                    <h1 class="headline">
                    @if (session()->get('language') == 'bangla')
                        {{ $singlepost->title_ban }}
                    @else
                        {{ $singlepost->title_en }}
                    @endif    
                    </h1>
                </header>
     
     
             <div class="article-info margin-bottom-20">
              <div class="row">
                    <div class="col-md-6 col-sm-6"> 
                     <ul class="list-inline">
                     <li>
                    @if (session()->get('language') == 'bangla')
                        {{ $singlepost->tags_ban }}
                    @else
                        {{ $singlepost->tags_en }}
                    @endif   
                    </li>     
                    <li><i class="fa fa-clock-o"></i> {{ $singlepost->post_date }} </li>
                     </ul>
                     <br>

                     {{-- social share button --}}
                     <div class="sharethis-inline-share-buttons"></div>

                    </div>
                    {{-- <div class="col-md-6 col-sm-6 pull-right"> 						
                        <ul>
                            <div class="sharethis-inline-share-buttons"></div>
                        </ul>						   
                    </div>						 --}}
                </div>				 
             </div>				
        </div>
      </div>
      <!-- ******** -->
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="single-news">
                <img src="{{ asset($singlepost->image) }}" alt="" />
                <p>
                @if (session()->get('language') == 'bangla')
                    {!! $singlepost->details_ban !!}
                @else
                {!! $singlepost->details_en !!}
                @endif  
                </p>
            </div>

            <div id="fb-root"></div>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="QiWznnYF"></script>
            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
            <!-- ********* -->
            <div class="row">
                <div class="col-md-12"><h2 class="heading">
                    @if (session()->get('language') == 'bangla')
                Related bangla News
                @else
                Related News
                @endif 
                </h2>
            </div>
@php
    // $related1 = DB::table('posts')->where($singlepost->category_id,'categories.id')->get();
    $related1 = DB::table('posts')->where('category_id',$singlepost->category_id)->orderBy('id')->limit(3)->get();
    // dd($related1);
    $related2 = DB::table('posts')->where('category_id',$singlepost->category_id)->orderBy('id','desc')->limit(3)->get();
@endphp

                @foreach ($related1 as $row)
                <div class="col-md-4 col-sm-4">     
                    <div class="top-news sng-border-btm">
                        <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
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


            <div class="row">
                @foreach ($related2 as $row)
                <div class="col-md-4 col-sm-4">
                    <div class="top-news">
                        <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
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
        </div>

@php
$verticalads = DB::table('ads')->where('type',0)->skip(2)->first();
@endphp
        <div class="col-md-4 col-sm-4">
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
                </div><!-- /.add-close -->
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
$latest = DB::table('posts')->orderBy('id','desc')->limit(10)->get();
// dd($latest);
$popular = DB::table('posts')->inRandomOrder()->limit(10)->get();
$spotlight = DB::table('posts')->orderBy('id')->inRandomOrder()->limit(10)->get();
@endphp
    
                <!-- Tab panes -->
                <div class="tab-content ">
                    <div role="tabpanel" class="tab-pane in active" id="tab21">
                        <div class="news-titletab">
                          
                            <div class="news-title-02">
                                @foreach ($latest as $row)
                            <h4 class="heading-03"><a href="#">
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
                            <h4 class="heading-03"><a href="#">
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
                            <h4 class="heading-03"><a href="#">
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

@php
$verticalads1 = DB::table('ads')->where('type',0)->skip(1)->first();
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
</section>


@endsection