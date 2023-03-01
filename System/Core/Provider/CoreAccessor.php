<?php
namespace Grape\Core\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\Core\Facade\Grape;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class CoreAccessor extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {
      // if( $this->app["grape"]->isRunning() ) {
      //    $this->load($HTTP, $LANG);
      // }
   }

   public function register() {
      require_once(__DIR__."/../Common.php");
   }

   public function getGrammars( $locale="es" ) {
      // if( $this->app["files"]->exists(__VENDORPATH__."App/Http/Langs/$locale.php") ) {
      //    return $this->app["files"]->getRequire(__VENDORPATH__."App/Http/Langs/$locale.php");
      // }

      return NULL;
   }
}
