@extends("install::layouts.template")

   @section("content")

         <article class="box box-light">

            <header class="box-header pb-0">
               <h4>
                  <i class="mdi mdi-database"></i>
                  {{__("words.database")}}
               </h4>
               <div style="float: right;">
                     @if( $isdb )
                     <div class="btn-group">
                     <a href="{{__url('/install/database/reset')}}" class="btn btn-outline-secondary btn-sm">
                           {{__("words.reset")}}
                        </a>
                        <a href="{{__url('/install/database/destroy')}}" class="btn btn-outline-secondary btn-sm">
                           {{__("words.destroy")}}
                        </a>
                     </div>
                     @else
                     <a href="{{__url('/install/database/entities')}}" class="btn btn-danger">
                        <i class="mdi mdi-cog"></i>
                        {{__("install.entities")}}
                     </a>
                     @endif
                  </div>
            </header>

            <article class="box-body pt-4">

               <div class="">
                  
                  <table class="table bg-white">
                     <thead class="bg-secondary text-white">
                        <tr>
                           <th>{{__("words.engine")}}</th>
                           <th>{{__("words.host")}}</th>
                           <th>{{__("words.port")}}</th>
                           <th>{{__("words.database")}}</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>{{$dbstor["engine"]}}</td>
                           <td>{{$dbstor["host"]}}</td>
                           <td>{{$dbstor["port"]}}</td>
                           <td>{{$dbstor["database"]}}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>               

               <div class="block">
                  @if( $isdb )
                  <h4>
                     <i class="mdi mdi-account-cog"></i>
                     {{__("words.account")}}
                  </h4>

                  <form action="{{__url('/install/database')}}" method="POST">
                     <div class="form-group pb-2">
                        <label for="">{{__("words.email")}}</label>
                        {!! $errors->first("email", '<p class="error m-0 mb-1 text-danger"> :message </p>') !!}
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                     </div>

                     <div class="form-group pb-2">
                        <label for="">{{__("words.password")}}</label>
                        {!! $errors->first("pwd", '<p class="error m-0 mb-1 text-danger"> :message </p>') !!}
                        <input type="password" name="pwd" value="{{old('pwd')}}" class="form-control">
                     </div>

                     <div class="form-group pb-2">
                        <label for="">{{__("words.pconfirm")}}</label>
                        {!! $errors->first("rpwd", '<p class="error m-0 mb-1 text-danger"> :message </p>') !!}
                        <input type="password" name="rpwd" value="{{old('rpwd')}}" class="form-control">
                     </div>
                     @endif
                     <div class="form-group pt-2">
                        @csrf
                        <a href="{{__url('/install/env')}}" class="btn btn-outline-primary btn-sm">
                           <i class="mdi mdi-arrow-left-bold"></i> {{__("words.return")}}
                        </a>
                        @if( $isdb )
                        <a href="{{__url('install/end')}}" class="btn btn-primary btn-sm">
                           {{__("words.next")}} <i class="mdi mdi-arrow-right-bold"></i>
                        </a>                       
                        @endif

                     </div>
                  </form>
               </div>

            </section>
         </article>
         
   @endsection
