<?php
namespace Grape\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\Core\Model\Driver;

class End {

   protected $app;

   public function __construct( Driver $app ) {
      $this->app = $app;
   }

   public function data() {
      return [
      ];
   }

   public function close() {

      $core = $this->app->loadCore();
      
      $core->activated = 1;

      if( $core->save() ) {
         return redirect()->to("/");
      }

      return back();
   }
}
