<?php
/*
*---------------------------------------------------------
* ROUTES ADMIN
*---------------------------------------------------------
*/

Route::get("/", "HomeController@index");

Route::get("publishes", function(){
    \Artisan::call("vendor:publish", ["--tag" => "lighter", "--force" => null]);
    
    return back();
});