<?php
namespace Grape\User\Facade;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/
use Illuminate\Support\Facades\Facade;

class User extends Facade {
   public static function getFacadeAccessor(){return "User";}
}
