<?php
namespace Grape\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\Core\Model\Core;

class End {

   protected $app;

   public function __construct( Core $app ) {
      $this->app = $app;
   }

   public function data() {
      return [
      ];
   }

   public function close() {

      if( $this->app->toggleCore(1) ) {
         return redirect()->to("/");
      }

      return back();
   }
}
