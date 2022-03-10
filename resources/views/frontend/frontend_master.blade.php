@php
    $meta = DB::table('seos')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $meta->meta_author }}">
        <meta name="title" content="{{ $meta->meta_title }}">
        <meta name="keyword" content="{{ $meta->meta_keyword }}">
        <meta name="description" content="{{ $meta->meta_description }}">
        <title> {{ $meta->meta_title }} </title>

        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/style.css') }}" rel="stylesheet">

        {{-- share script code from https://sharethis.com/onboarding/ --}}
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62276de3b9a7530012fa805d&product=inline-share-buttons" async="async"></script>
    </head>
    <body>

        @include('frontend.contents.header')


        @yield('frontend_content')

	
	
        @include('frontend.contents.footer')
	
	
	
	
	
	
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	</body>
</html> 