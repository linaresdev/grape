<?php
namespace Grape\User\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {
      require_once(__DIR__."/../Common.php");
   }

   public function register() {
      $this->app->bind("User", function($app) {
         return new \Grape\User\Store();
      });
   }
}
