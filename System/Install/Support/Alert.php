<?php
namespace Grape\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Alert {

   protected $session;

   public function __construct( $session ) {
      $this->session = $session;
   }

   public function has($key="alertMessage") {
      return $this->session->has($key);
   }

   public function fire($style, $message) {
      $this->session->flash("alertStyle", $style);
      $this->session->flash("alertMessage", $message);
   }

   public function info($message) {
      $this->fire("info", $message);
   }

   public function error($message) {
      return $this->fire("danger", $message);
   }

   public function success($message) {
      return $this->fire("success", $message);
   }
   public function warning($message) {
      return $this->fire("warning", $message);
   }

   public function style() {
      return $this->session->get("alertStyle");
   }

   public function message() {
      return $this->session->get("alertMessage");
   }
}
