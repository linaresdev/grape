<?php
namespace Grape\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class HomeSupport {

    public function index() {

        $data['title'] = 'Grape';

        return $data;
    }
}