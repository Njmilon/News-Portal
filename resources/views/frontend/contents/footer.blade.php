
@php
    $setting = DB::table('websitesettings')->first();
@endphp


<!-- top-footer-start -->
<section>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="foot-logo">
                        <img src="{{ asset($setting->footer_logo) }}" style="height: 50px;" />
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
                     <div>
                        <ul>
                            <div class="sharethis-inline-share-buttons"></div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="apps-img">
                        <ul>
                            <li><a href="#"><img src="{{ asset('frontend/assets/img/apps-01.png') }}" alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/assets/img/apps-02.png') }}" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.top-footer-close -->

<!-- middle-footer-start -->	
<section class="middle-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="editor-one">
                   
                @if (session()->get('language') == 'bangla')
                {!! $setting->address_ban !!}
                @else
                {!! $setting->address_en !!}
                @endif   
                    
                    
                </div> 
               
                </div>
            
            <div class="col-md-4 col-sm-4">
                <div class="editor-two">
                    <ul>
                        <i class="fa fa-phone"></i> +880 {{ $setting->hotline_no }} 
                    </ul>
                    <ul>
                        <i class="fa fa-phone"></i> +880 {{ $setting->phone_no  }} 
                    </ul>
                    
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-three">
                    <ul><i class="fa fa-envelope-o"></i> {{ $setting->email }}</ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.middle-footer-close -->

<!-- bottom-footer-start -->	
<section class="bottom-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="copyright">						
                    All rights reserved © 2022 N.J.MILON
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="btm-foot-menu">
                    <ul>
                        <li><a href="https://web.facebook.com/ochena.mahamud/" target="_blank">About US</a></li>
                        <li><a href="https://web.facebook.com/ochena.mahamud/" target="_blank">Contact US</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
