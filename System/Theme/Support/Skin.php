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

    public function load( $slug=null )  {
        if( is_string($slug) ) {
            $this->slug = $slug; return $this;
        }
    }
    
    public function helpers() {
        return $this->driver->helpers();
    }

    public function path( $route="master" ) {
        return "{$this->slug}::{$route}";
    }
}