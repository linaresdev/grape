<?php
namespace Grape\Core\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Grape\Core\Model\Lang;
use Grape\Core\Model\Config;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model {

    protected $table = 'drivers';

    protected $fillable = [
        "type",
        "parent",
        "slug",        
        "driver",
        "token",
        "icon",
        "activated",
        "created_at",
        "updated_at"
    ];

    /*
    * Modificadores */
    public function setTokenAttribute( $value ) {
        if(is_null($value)) {
            $value = \Str::random( mt_rand(15, 25) );
        }
        return $this->attributes['token'] 	= $value;
    }

    /*
    * Relaciones */
    public function configs() {
		return $this->hasOne(Config::class, "driver_id");
	}

    public function langs() {
        return $this->hasMany( Lang::class, "driver_id" );
    }

    /*
   * SCOPE Methods */
    public function scopeType( $query, $type=null ) {
        if( !empty( $type ) ) {
            return $query->where("type", $type);
        }

        return $query;
    }

}