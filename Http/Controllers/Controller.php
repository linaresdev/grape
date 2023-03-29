<?php
namespace Grape\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
*/

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController {

    use DispatchesJobs, ValidatesRequests;

    protected $path='grape::';


    public function boot( $support=null, $data=[] ) {

        $this->support = $support;

        if( method_exists( $support, 'share' ) ) {
            $data = array_merge( $data, $support->share() );
        }

        $this->share( $data );
    }

    public function share( $data ) {
        if( !empty( $data ) && is_array( $data ) ) {
            view()->share( $data );
        }
    }


    public function render( $view=NULL, $data=[], $mergeData=[]) {

        if(view()->exists(($path = $this->path.$view))) {
            return view($path, $data, $mergeData);
        }

        abort(404, 'La vista {$path} no existe');
    }

}