<?php
namespace Grape\Install\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

   protected $namespace = "Grape\Install\Controllers";

   public function boot() {
      parent::boot();
   }

   public function map() {
      Route::prefix("install")
         ->middleware('web')->namespace($this->namespace)->group(__DIR__."/../Routes.php");
   }
}
