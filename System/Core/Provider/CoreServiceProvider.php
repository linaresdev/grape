<?php
namespace Grape\Core\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;

class CoreServiceProvider extends CoreAccessor {

   public function load( $http, $lang ) {
      /*
        *  LOAD MAP
        *  Niveles de ejecución del registro
        * -----------------------------------
        * [4] => THEMES | [5] => WIDGETS
        * -----------------------------------
        */

       // dd($this->app["core"]->load("loader")->module());
   }

   public function mount( $app ) {
      /*
        *  INIT MAP
        *  Niveles de ejecución del registro
        * -----------------------------------------------------------------
        * [0] => CORE | [1] => LIBRARIES | [2] => PACKAGES | [3] => PLUGINS
        * -----------------------------------------------------------------
      */

      /*
		    * [0] => CORE */
        $app->startModules("core");

      /*
		    * [1] => LIBRARIES */
        $app->startModules("library");       

      /*
		    * [3] => PACKAGES */
        $app->startModules("package"); /*

      /*
        * [2] => PLUGINS */
        $app->startModules("plugin");

   }
}
