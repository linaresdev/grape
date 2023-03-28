<?php
/*
*---------------------------------------------------------
* GRAPE ROUTE
*---------------------------------------------------------
*/

Route::prefix("admin")->namespace("web")->group(__path("__grape/Http/Route/admin.php"));