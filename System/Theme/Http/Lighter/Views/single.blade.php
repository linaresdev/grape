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
        <article role="lighter" class="single">

            <nav class="navbar bg-white fixed-top navbar-expand-md px-3">
                <a href="#" class="navbar-brand">
                    Inicio
                </a>

                <button class="navbar-toggler" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#mainBar" 
                        aria-controls="mainBar" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="mainBar" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Link0
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Link1
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <section class="lighter-body">
                <article class="{{$container}}">                    
                    @yield("body", "Content Body")
                </article>
            </section>
        </article>

        
    
        @section("js")

        <script src="{{__url('__lighter/js/jquery-v3.6.4.min.js')}}"></script>
        <script src="{{__url('__lighter/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{__url('__lighter/js/layout.ui.js')}}"></script>
        @show

    </body>
</html>