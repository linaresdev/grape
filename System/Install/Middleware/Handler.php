<?php
namespace Grape\Install\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Handler {

   public function init() {
      return [
         \Grape\Install\Middleware\InstallMiddleware::class,
      ];
   }

   public function route() {
      return [];
   }
   public function groups() {
      return [
         "install" => [
         ]
      ];
   }
}
