@extends('frontend.frontend_master')	
    
@section('frontend_content')  

<!-- archive_page-start -->
<section class="single_page">						
    <div class="container-fluid">											
    <div class="row">
        <div class="col-md-12">
            <div class="single_info">
                <span>
                    <a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> /
                    </a>
                    <a href="{{ route('category.single.news.page',$subcategoryname->id) }}">
                         @if (session()->get('language') == 'bangla')
                            {{ $subcategoryname->subcategory_ban }}
                        @else
                            {{ $subcategoryname->subcategory_en }}
                        @endif 
                    </a>  
              			               
                </span>				    
            </div>
        </div>
        <div class="col-md-9 col-sm-8">								
            <div class="archive_post_sec_again">
                @foreach ($singlesubcategory as $row)
                <div class="row">
                   
                         <div class="col-md-4 col-sm-5">
                        <div class="archive_img_again">
                            <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="archive_padding_again">
                            <div class="archive_heading_01">
                                <a href="#">
                                    @if (session()->get('language') == 'bangla')
                                    {{ $row->title_ban }}
                                @else
                                    {{ $row->title_en }}
                                @endif 
                                </a>
                            </div>
                            <div class="archive_dtails">
                                @if (session()->get('language') == 'bangla')
                                {!! Str::limit($row->details_ban,200) !!} 
                            @else
                                {!! Str::limit($row->details_en,200) !!} 
                            @endif 

                            
                            </div> 
                            <div class="dtails_btn"><a href="{{ route('design.single.page',$row->id) }}">
                                @if (session()->get('language') == 'bangla')
                                আরও পড়ুন...
                            @else
                                Read More...
                            @endif 
                            </a>
                            </div>
                            
                        </div>
                    </div>
                  
                   
                </div>
                @endforeach
                {!! $singlesubcategory->links() !!}	
            </div>
            									                          	
        </div>
        <div class="col-md-3 col-sm-4">

@php
$verticalads = DB::table('ads')->where('type',0)->skip(3)->first();
@endphp
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
@php
$verticalads1 = DB::table('ads')->where('type',0)->first();
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