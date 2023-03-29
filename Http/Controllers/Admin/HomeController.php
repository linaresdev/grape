<?php
namespace Grape\Http\Controllers\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Grape\Http\Support\Admin\HomeSupport;

class HomeController extends Controller {

    public function __construct( HomeSupport $support ) {
        $this->boot($support);
    }

    public function index() {
        return $this->render('home', $this->support->index());
    }
}