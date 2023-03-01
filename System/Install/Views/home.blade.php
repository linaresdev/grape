@extends("install::layouts.master")

   @section("css")
      <style media="screen">
         body {background: #f0f0f0;}
         .container{
            margin: 10% 25% 15px 25%;
         }
         .bt{display: inline-block;border-radius: 3px 3px;padding: 7px 10px;text-underline: none;text-decoration: none;}
         .bt:hover{opacity: .7;}
         .bt.bt-uva{background: #7952b3;color: #fff;}
         .bt.bt-primary {background: #0b5ed7;color: #fff;}
         .bt.bt-info {background: #0dcaf0;color: #fff;}
         .box{background: #fff; border-radius: 4px 4px;}
         .box .box-header { color:#7952b3; padding: 20px 15px 5px 15px;}
         .box .box-header svg{ fill:#7952b3; width: 128px;}
         .box .box-header h4 {display: block;margin: 0 0;font-size: 18px;padding: 0 0;}
         .box .box-body {padding: 5x 0 0 0;}
         .box .box-body .block {padding: 0 15px 15px 15px;}
         .box.box-center{
            background: transparent;
            text-align: center;
         }
      </style>
   @endsection

   @section("body")

      <main class="container">
         <article class="box box-center">
            <header class="box-header">           
               
               {!! app("files")->get(__path("__grape/iconview.svg")) !!}              
                     
               <h4>GRAPE</h4>
            </header>
            <section class="box-body">

               <article class="block">
                  {{ __("grape.description") }}
               </article>

               <article class="block">
                  <a href="https://github.com/rlinaresdev/core" target="_blank" class="bt bt-info">
                     {{__("words.information")}}
                  </a>
                  <a href="{{url('requeriments')}}" class="bt bt-primary">{{__("words.requeriment")}}</a>
                  <a href="{{__url("/install/env")}}" class="bt bt-uva">{{__("install.init")}}</a>
               </article>
            </section>
         </article>
      </main>
   @endsection

   @section("js")
   @endsection
