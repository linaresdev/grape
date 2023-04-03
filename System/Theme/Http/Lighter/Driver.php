<?php
namespace Grape\Theme\Http\Lighter;
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

    public function info() {

        return [
            'name'          => 'Lighter',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'rlinareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.1',
            'description'   => 'Plantilla por defecto para Grape Project'
        ];
    }

    public function app() {
        return [
            'type'          => 'theme',
            'slug'          => 'lighter',
            'driver'        => \Grape\Theme\Http\Lighter\Driver::class,
            'token'         => NULL,
            'activated'     => 1
        ];
    }

    public function helper() {
        return __DiR__."/Helper.php";
    }

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app) { }
    public function destroy($app) { }

}

