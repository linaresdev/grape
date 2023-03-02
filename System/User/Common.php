<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

if( !function_exists("add_user_rols") ) {
   function add_users_rols($data) {
      \Grape\User\Facade\User::loadRols($data);
   }
}

if( !function_exists("get_users_rols") ) {
   function get_users_rols() {
      return \Grape\User\Facade\User::rols();
   }
}


if(!function_exists("has_user_rol") ) {
   function has_user_rol($rol) {
      return in_array($rol, \Grape\User\Facade\User::rols());
   }
}
