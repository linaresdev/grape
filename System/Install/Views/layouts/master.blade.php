<!DOCTYPE html>
<html lang="{{$language}}" dir="ltr">
   <head>
      <meta charset="{{$charset}}">
   	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   	  <meta name="viewport" content="width=device-width, initial-scale=1">
   	  <link href="{{config("app.logo")}}" rel='shortcut icon' type='image/png'/>

      @section("metadata")

   	 <!-- CSRF Token -->
   	 <meta name="csrf-token" content="{{ csrf_token() }}">

		@show

      <title>{{$title}}</title>

      @section("css")

     <link href="{{__url('__cdn/css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{__url('__cdn/css/mdi-6595.min.css')}}" rel="stylesheet">
     <link href="{{__url('__cdn/css/layout.ui.css')}}" rel="stylesheet">
     @show

   </head>
   <body>

      @yield("body", 'Content Page')

		@section("js")

		<script src="{{__url('__cdn/js/jquery-360.min.js')}}"></script>
		<script src="{{__url('__cdn/js/bootstrap.min.js')}}"></script>
		<script src="{{__url('__cdn/js/layout.ui.js')}}"></script>
		@show

   </body>
</html>
