<?php
namespace Grape\Install\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use IlluminateSupportFacadesAuth;

class InstallMiddleware {

   protected $exerts = [];

   public function handle($request, Closure $next, $guard = "web") {
      if( app("grape")->stable() == false && __segment(1) != "install" ) {
         return redirect("install");
      }
      return $next($request);
   }

}
