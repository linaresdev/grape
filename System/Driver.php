<?php
namespace Grape;
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
            'version'       => 'V-0.1',
            'description'   => 'Gestor de aplicaciones para Grape.'
        ];
    }

    public function app() {
        return [
            'type'      => 'package',
            'slug'      => 'grape',
            'driver'    => \Grape\Driver::class,
            'token'     => NULL,
            "icon"      => 'cogs',
            'activated' => 1
        ];
    }

    public function libraries() {
        return [];
    }

    public function providers() { 
        return [
            \Grape\Provider\ServiceProvider::class,
            \Grape\Provider\RouteServiseProvider::class,
        ]; 
    }
    public function alias() { return []; }

    public function migratePath() {        
        $path = __path('__grape/System/User/Database/Migration');
        $path = str_replace(base_path('/'), null, $path);

        return $path;
    }

    public function install($app) {

        $app->create($this->app());
        
        \Artisan::call(
            "migrate", ["--path" => $this->migratePath(), "--force" => true]
        );
    }

    public function uninstall($app) {  
        \Artisan::call(
            "migrate:reset", ["--path" => $this->migratePath()]
        );
    }
}