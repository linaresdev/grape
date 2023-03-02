<?php
namespace Grape\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Info extends Model {

   protected $table = "usersdata";

   protected $fillable = [
      "user_id",
      "firstname",
      "lastname",
      "email",
      "birthday",
      "gender"
   ];

   public $timestamps = false;
}
