<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/* CORE FACADE */
$this->app->bind( "Grape", function($app) {
	return new \Grape\Core\Support\Core(
		new \Grape\Core\Support\Bootstrap($app)
	);
});

## INSTANCIA DEL CORE
$this->app["grape"] = Grape::load();

## FUNCIÓN CORE
if(!function_exists("Malla")) {
   function grape( $key=null ) {
      return Grape::load($key);
   }
}


// ## REGISTROS DE BIBLIOTECAS BÁSICAS
Grape::load( "finder", new \Grape\Core\Support\Finder );
Grape::load( "loader", new \Grape\Core\Support\Loader($this->app) );
Grape::load( "coredb", new \Grape\Core\Support\StorDB( $this->app["db"] ) );
Grape::load( "urls", new \Grape\Core\Support\Urls($this->app) );

## COMMON HELPER
require_once(__DIR__."/Support/Helper.php");


Grape::run(\Grape\Core\Driver::class);

## URL ETIQUETADAS
// Grape::addUrl([
//    "__base"    	=> Grape::load("urls")->baseDir(),
//    "__cdn"    	=> "__base/cdn/",
// ]);

// ## DIRECTORIOS ETIQUETADOS
// Malla::addPath([
//    "__base"          => malla("urls")->baseDir(),
//    "__core"          => realpath(__DIR__."/../"),
//    "__admin"          => realpath(__DIR__."/../../Admin"),
//    "__cdn"           => public_path("__base/cdn/"),
//    "__localmodule"   => realpath(__DIR__."/../../../")."/",
//    "__locale"        => "__core/Http/Locale/",
//    "__public"        => public_path("/__base"),
//    "__admin_asset"   => public_path("/__base/admin/assets")
// ]);

// /* APP CONFIGS
// * Archivo de configuracion */
// $configs = $this->app["files"]->requireOnce(__DIR__."/app.php");

// foreach ($configs as $key => $value) {
//    $this->app['config']->set("app.$key", $value);
// }

// /* INIT
// * Inicializando los modulos */
// Malla::init();

// if( Malla::isRunning() ) {
//    /*
//    * HANDLER AND LOAD STABLE CORE */
//    $this->mount(Malla::load());
// }
// else {
//    Malla::run(\Malla\Install\Driver::class);
// }
