<?php
namespace Grape\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider {

    public function boot() {
        require_once(__path("__http/App.php"));
    }

    public function register() {
        require_once(__path("__grape/System/Common.php"));
    }
}