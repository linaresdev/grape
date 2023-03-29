<?php
namespace Grape\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Grape\Http\Support\HomeSupport;

class HomeController extends Controller {

    public function __construct( HomeSupport $support ) {
        $this->boot($support);
    }

    public function index() {
        $this->render('path.view', $this->support->index());
    }
}