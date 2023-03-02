<?php
namespace Grape\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {

   protected $table = "usersmeta";

   protected $fillable = [
      "user_id",
      "type",
      "key",
      "value",
      "activated",
   ];

   public $timestamps = false;

   //protected $dateFormat = 'U';
}
