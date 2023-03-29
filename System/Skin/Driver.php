<?php
namespace Grape\Skin;
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

    public function info() {

        return [
            'name' => 'Skin',
            'author' => 'Ramon A Linares FEbles',
            'email' => 'rlinarelf@gmail.com',
            'license' => 'Mit',
            'support' => 'https://iipec.net',
            'version' => 'V-0.1',
            'description' => 'Biblioteca de plantillas'
        ];
    }

    public function app() {

        return [
            'type'      => 'library',
            'slug'      => 'skin',
            'driver'    => \Grape\Skin\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app) {
        $app->create($this->app());
    }
    public function destroy($app) { }

}