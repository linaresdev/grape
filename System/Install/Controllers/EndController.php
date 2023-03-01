<?php
namespace Grape\Install\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Grape\Install\Support\End;

class EndController extends Controller {

   public function __construct( End $app ) {
      $this->boot($app);
   }

   public function index() {
      return $this->render( "end", $this->app->data() );
   }
   public function close() {
      return $this->app->close();
   }
}
