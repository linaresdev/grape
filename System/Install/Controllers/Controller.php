<?php
namespace Grape\Install\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   protected $app;

   protected $path = "install::";

   public function boot( $app=null, $data=[] ) {

      $app->alert       = new \Grape\Install\Support\Alert(session());

      $this->app        = $app;

      $data["path"]     = $this->path;
      $data["title"]    = "Empty";
      $data["charset"]  = "utf-8";
      $data["language"] = "es";
      $data["alert"]    = $app->alert;



      $this->share($data);

      if( method_exists($app, "share") ) {
         $this->share($app->share());
      }

      if( method_exists($this, "parseData") ) {
         $this->parseData();
      }
   }

   public function share($data) {
      if(!empty($data) && is_array($data) ) {
         view()->share($data);
      }
   }

   public function render($view=NULL, $data=[], $mergeData=[]) {

      if(view()->exists(($path = $this->path.$view))) {
         return view($path, $data, $mergeData);
      }

      abort(500, "La vista {$path} no existe");
   }

}
