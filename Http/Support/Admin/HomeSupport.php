<?php
namespace Grape\Http\Support\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class HomeSupport {

    public function index() {

        $data['store'] = 'Admin Grape';

        return $data;
    }
}