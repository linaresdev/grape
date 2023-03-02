<?php
namespace Grape\Core\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class CoreInfo extends Model {

  protected $table = "appinfo";

  protected $fillable = [
   "name",
   "author",
   "email",
   "avatar",
   "license",
   "support",
   "version",
   "description",
   "comment",
   "app_id",
  ];
}
