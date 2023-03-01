<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
 * Install
*/

/*
* URLS */
$this->app["grape"]->addUrl([
]);

/*
* GRAMMARIES */
$this->loadGrammary("es_DO");

/*
* MIDDLEWARE */
$this->bootMiddleware(\Grape\Install\Middleware\Handler::class);

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'install');

/*
* CDN */
$this->publishes([
   __path(__DIR__."/Storage/Assets") => __path("__cdn"),
   //__path("__http/Rosy/Assets") => __path("__base/theme/rosy")
], "install");
