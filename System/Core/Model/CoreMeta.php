<?php
namespace Malla\Core\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class CoreMeta extends Model {

  protected $table = "appsmeta";

  protected $fillable = [
   "app_id",
   "type",
   "key",
   "value",
   "activated"
  ];

  //public $timestamps = false;

  //protected $dateFormat = 'U';
}
