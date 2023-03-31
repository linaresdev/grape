<?php
namespace Grape\Theme\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/
use Illuminate\Filesystem\Filesystem as File;

class Skin {

    protected $slug;

    protected $driver;

    public function load( $driver=null )  {

        if( class_exists( $driver ) ) {
            dd( $driver );
        }

        //$this->slug = $slug;

        return $this;
    }

    public function path( $route="master" ) {
        return "{$this->slug}::{$route}";
    }
}