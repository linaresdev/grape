<?php
/*
*---------------------------------------------------------
* GRAPE ROUTE
*---------------------------------------------------------
*/

Route::prefix("admin")->middleware("web")
                      ->namespace("Admin")
                      ->group(__path("__grape/Http/Route/admin.php"));