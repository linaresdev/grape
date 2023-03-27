<?php
namespace Grape\Install\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Grape\Install\Support\Env;

class EnvController extends Controller {

   public function __construct( Env $app ) {
      $this->boot($app);

      // if( !app("files")->exists( __path("__base/cdn") ) ) {
      //    $app->published();
      // }
   }

   public function index() {
      return $this->render( "env", $this->app->data() );
   }

   public function update( Request $request ) {
      return $this->app->update($request);
   }

   public function published() {
      return $this->app->published();
   }

}
