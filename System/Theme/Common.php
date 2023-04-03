<?php
/*
*---------------------------------------------------------
* Helper de la Biblioteca de Plantillas
*---------------------------------------------------------
*/

$this->app->bind("Skin", function( $app ) {
    return new \Grape\Theme\Support\Skin($app);
});

$this->app["skin"] = Grape\Theme\Facade\Skin::load();

if( !function_exists("skin") ) {
    function skin($key=null) {

        if( !is_null($key) ) {

        }

        return app("skin");
    }
}