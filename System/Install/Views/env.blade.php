@extends("install::layouts.template")

   @section("content")

         <article class="box box-light">
            <header class="box-header">
               <h4>
                  <i class="mdi mdi-laravel"></i> {{env("APP_NAME")}} {{__path("__base")}}
               </h4>
            </header>
            <section class="box-body">

               <article class="block bg-light pt-3">
                  Actualizar los recursos públicos
                  <a href="{{__url("install/env/published")}}" class="btn btn-outline-secondary btn-sm" style="float:right">
                     <i class="mdi mdi-publish"></i>
                     {{__("words.update")}}
                  </a>
               </article>

               <article class="block">
                  <form action="{{ __url("install/env") }}" method="POST">
                     <div class="form-group pt-1">
                        <label>{{__("laravel.environmet")}}</label>
                        <div class="form-group pt-1">
                           <textarea spellcheck="false" name="env" class="form-control txt-editor">{{$env}}</textarea>
                        </div>
                     </div>
                     <div class="form-group pt-2">
                        @csrf
                        <a href="{{__url('/install')}}" class="btn btn-secondary btn-sm">
                           {{ __("words.return") }}
                        </a>
                        <button type="submit" name="button" class="btn btn-primary btn-sm">
                           {{ __("words.update") }}
                        </button>
                        <a href="{{__url('/install/database/entities')}}" class="btn btn-success btn-sm">
                           {{__("words.database")}}
                        </a>
                     </div>
                  </form>
               </article>
            </section>
         </article>

   @endsection
