<?php
namespace Grape\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable {

   use HasApiTokens, HasFactory, Notifiable;

   protected $table = "users";

   protected $fillable = [
      "type",
      "firstname",
      "lastname",
      "fullname",
      "shortname",
      "rnc",
      "user",
      "cellphone",
      "email",
      "email_verified_at",
      "password",
      "avatar",
		"activated",
      "remember_token",
		"created_at",
		"updated_at"
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   /*
  * SETTINGS */
   public function setPasswordAttribute($value) {
      $value = trim($value);
      $value = bcrypt($value);
      $this->attributes['password'] = $value;
   }

   /*
  * RELATIONS */
   public function info() {
      return $this->hasOne(Info::class, "user_id");
   }
   public function meta() {
      return $this->hasMany(Meta::class, "user_id");
   }

   public function groups() {
      return $this->belongsToMany(Group::class, "users_groups", "user_id", "group_id")->withPivot(
          "view", "insert", "update", "delete"
      );
   }

   public function type(): Attribute {
      return new Attribute(
         set: function($value) {

            // if( !has_user_rol($value) ) {
            //    abort(401, "Debe especificar un rol valido para el usuario");
            // }

            return $value;
         }
      );
   }


   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
