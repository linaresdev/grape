<?php
/*
*---------------------------------------------------------
* FUNTIONS GRAPE
*---------------------------------------------------------
*/

## SKIN
$SKIN = Skin::load( config("app.admin.skin") );

## VIEW PATH
$this->loadViewsFrom(__DIR__.'/Views', 'grape');
