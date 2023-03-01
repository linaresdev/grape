<?php
namespace Projet
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

    public function info() {

        return [
            'name'          => 'Grape',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://iipec.net/application/grape',
            'version'       => 'V-0.0',
            'description'   => 'Es la uva para desarrollar grandes, medianos y pequeño proyectos.'
        ];
    }

    public function app() {

        return [
            'type'      => 'package',
            'slug'      => 'grape',
            'driver'    => '\Grape\Driver::class',
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function libraries() {
        return [];
    }

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app) { }
    public function destroy($app) { }
}