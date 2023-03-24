<?php
namespace Grape\Core\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Lang extends Model {

    protected $table = 'locales';

    protected $fillable = [
        "id",
        "driver_id",
        "key",
        "value"
    ];

    protected $timestamps = false;
}