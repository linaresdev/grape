<?php
namespace Grape\Theme;
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

    public function info() {

        return [
            'name'          => 'Theme',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'rlinarelf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://iipec.net',
            'version'       => 'V-0.1',
            'description'   => 'Biblioteca de plantillas'
        ];
    }

    public function app() {

        return [
            'type'      => 'library',
            'slug'      => 'theme',
            'driver'    => \Grape\Theme\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function providers() { 
        return [
            \Grape\Theme\Provider\ThemeServiceProvider::class,
        ]; 
    }
    public function alias() { 
        return [
            "Skin"  => \Grape\Theme\Facade\Skin::class,
        ]; 
    }

    public function install( $app ) {
        $app->create($this->app());
    }
    
    public function destroy( $app ) { }

}