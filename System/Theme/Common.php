<?php
/*
*---------------------------------------------------------
* Helper de la Biblioteca de Plantillas
*---------------------------------------------------------
*/

$this->app->bind("Skin", function( $app ) {
    return new \Grape\Theme\Support\Skin($app);
});
