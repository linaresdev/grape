<?php
/*
*---------------------------------------------------------
* LIGHTER HELPERS
*---------------------------------------------------------
*/

## PATH
Grape::addPath([
    "__lighter" => "__base"
]);

## URLS
Grape::addUrl([
    "__lighter" => "__base/themes/lighter"
]);

## Data View
$data["charset"]    = "utf-8";
$data["skin"]       = Skin::load($slug);
$data["language"]   = $this->app->getLocale();
$data["title"]      = "Lighter Skin";
$data["typeicon"]   = null;
$data['icon']       = null;
$data["container"]  = "container-fluid";

## VIEW PATH
$this->loadViewsFrom(__DIR__.'/Views', 'lighter');

## SKIN Resouces
$this->app["view"]->share( $data );

$this->publishes([
    __DIR__."/Public" => __path("__public/themes/lighter")
], "lighter");