<?php
namespace Grape\Install\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Grape\Install\Request\User;
use Grape\Install\Support\Database;

class DatabaseController extends Controller {

  public function __construct( Database $app ) {
    $this->boot($app);
  }

  public function index() {
    return $this->render( "database", $this->app->data() );
  }

  public function entities() {
    return $this->app->forgeCoreDB();
  }

  public function account( User $request ) {
    return $this->app->account($request);
  }

  public function reset() {
    return $this->app->reset();
  }

  public function destroy() {
    return $this->app->destroy();
  }
}
