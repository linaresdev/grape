<?php
namespace Grape\Core\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    protected $table = 'configs';

    protected $fillable = [
        "id",
        "driver_id",
        "key",
        "value",
    ];

    protected $timestamps = false;
}