@extends("install::layouts.master")

   @section("body")
      <main class="container">
         <article class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">

            <section role="install">

               @if( $alert->has() )
               <article class="alert alert-install alert-{{$alert->style()}}">
                  {{ $alert->message("alert") }}
               </article>
               @endif

               @yield("content", "Document")
            </section>

         </article>
      </main>
   @endsection
