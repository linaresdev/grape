<?php
/*
*---------------------------------------------------------
* COMMON GRAPE
*---------------------------------------------------------
*/

## CONFIGS
$configs = [
    "app.locale"      => "es",
    "app.fake_locale" => "es_DO",
    "app.timezone"    => "America/Santo_Domingo",

    "app.skins"        => [
        "lighter"   => \Grape\Theme\Http\Lighter\Driver::class
    ],
    "app.admin.skins"  => [
        "lighter"   => \Grape\Theme\Http\Lighter\Driver::class
    ],
];

foreach($configs as $key => $value) {
    $this->app["config"]->set($key, $value);
}

## DIRECTORIOS ETIQUETADOS
Grape::addPath([
    "__http"    => "__grape/Http",
    "__system"  => "__grape/System",
]);
