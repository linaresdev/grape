<?php
namespace Grape\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiseProvider extends ServiceProvider {

    public function boot() {
        parent::boot();
    }

    public function map() {
        Route::namespace("Grape\Http\Controllers")->group(
            __path('__http/Route/app.php')
        );
    }
}