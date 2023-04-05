<?php
/*
*---------------------------------------------------------
* FUNTIONS GRAPE
*---------------------------------------------------------
*/

## EJECUTA ESTO SI Y SOLO SI ESTAS EN EL DOMINIO ADMIN
if( __segment(1, env("APP_MANAGER_NAME", "admin")) ):

    ## PATH
    Grape::addPath([
        //"__public" => public_path("")
    ]);
    
    ## SKIN
    $this->loadSkinFromDriver("lighter");

    ## VIEW PATH
    $this->loadViewsFrom(__DIR__.'/Views', 'grape');

    /*
    *  PUBLISHES FILES */
    $this->publishes([
        __path("__grape") => __path("__public/")
    ]);

endif;
