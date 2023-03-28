<?php
namespace Grape\Install\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest {

   public function authorize() {
      return true;
   }

   public function rules() {
      return [
         "email"     => "required|email",
         "pwd"       => "required",
         "rpwd"      => "required|same:pwd"
      ];
   }

   public function attributes() {
      return [
         "email"  => __("words.email"),
         "pwd"    => __("words.password"),
         "rpwd"   => __("words.pconfirm")
      ];
   }
}
