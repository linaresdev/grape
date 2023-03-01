@extends("install::layouts.template")

   @section("content")

         <article class="box box-light">

            <header class="box-header pb-0">
               <h4>
                  <i class="mdi mdi-database"></i>
                  {{__("words.database")}}
               </h4>
            </header>

            <article class="box-body pt-4">

               <div class="block bg-light mb-3 pt-3">

                  <ul class="list-group">
                     @foreach( $engine as $label => $value )
                     <li class="list-group-item px-3 py-1">
                        <strong>{{ $label }}</strong> : {{$value}}
                     </li>
                     @endforeach
                  </ul>

               </div>

               <div class="block">

                  @if( !$isdb )
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
                        <a href="{{__url('install/database/destroy')}}" class="btn btn-outline-danger btn-sm">
                           <i class="mdi mdi-database-minus"></i> Reset
                        </a>
                        <a href="{{__url('install/end')}}" class="btn btn-primary btn-sm">
                            Siguiente <i class="mdi mdi-arrow-right-bold"></i>
                        </a>
                        @else
                        <button type="submit" name="button" class="btn btn-danger btn-sm btn-block">
                           <i class="mdi mdi-cog"></i>
                           {{__("words.forge")}} {{__("init.construct")}}
                        </button>
                        @endif

                     </div>
                  </form>
               </div>

            </section>
         </article>
   @endsection
