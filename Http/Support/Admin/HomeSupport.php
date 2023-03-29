<?php
namespace Grape\Http\Support\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class HomeSupport {

    public function index() {

        $data['title'] = 'Admin Grape';

        return $data;
    }
}