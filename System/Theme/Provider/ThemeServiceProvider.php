<?php
namespace Grape\Theme\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider {

    public function boot() {
        require_once(__DIR__."/../Common.php");
    }

    public function register() {
        $this->bind("Skin", function($app) {
            return new \Grape\Theme\Support\Skin($app);
        });
    }
}