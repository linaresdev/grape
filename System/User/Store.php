<?php
namespace Grape\User;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\User\Model\Store as User;

class Store extends User {

   protected $rols = [];

   public function __construct() {

      ## Users Rols Default
      $this->rols = [
         "root",
         "administrator",
         "supevisor",
         "user"
      ];
   }

   public function rols() {
      return $this->rols;
   }

   public function loadRols($data=null) {
      foreach ($data as $key => $value) {
         $this->rols[$key] = $value;
      }
   }
}
