<!DOCTYPE html>
<html lang="{{$language}}">
    <head>
        <meta charset="{{$charset}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @section("metadata")
     
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @show
     
        <title>{{$title}}</title>

        <link rel="shortcut icon" type="{{$typeicon}}" href="{{$icon}}"/>
        @section("css")
     
        <link href="{{__url('__lighter/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{__url('__lighter/css/materialdesignicons-light.min.css')}}" rel="stylesheet">
        <link href="{{__url('__lighter/css/layout.ui.css')}}" rel="stylesheet">
        @show

     </head>
    <body>
        @includeIF("lighter::partial.navbar")

        @yield("body", "Content Body")
    
        @section("js")

        <script src="{{__url('__lighter/js/jquery-v3.6.4.min.js')}}"></script>
        <script src="{{__url('__lighter/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{__url('__lighter/js/layout.ui.js')}}"></script>
        @show

    </body>
</html>