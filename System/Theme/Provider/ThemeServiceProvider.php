<?php
namespace Grape\Theme\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Grape\Theme\Facade\Skin;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider {

    public function boot() {
        require_once(__DIR__."/../Http/App.php");
    }

    public function register() {
        require_once(__DIR__."/../Common.php");
    }
}