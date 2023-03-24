<?php
namespace Grape\Core;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
  		return [
  			"name"			=> "Core",
  			"author"		=> "Ing. Ramón A Linares Febles",
  			"email"			=> "rlinares4381@gmail.com",
  			"license"		=> "MIT",
  			"support"		=> "http://www.iipec.net",
  			"version"		=> "V-1.0",
  			"description" 	=> "Core V-1.0",
  		];
  	}

  	public function app() {
  		return [
  			"type"			=> "core",
  			"slug"			=> "core",
  			"driver"		=> \Grape\Core\Driver::class,
  			"token"			=> NULL,
			"icon"			=> "mdi-heart-pulse",
  			"activated" 	=> 0,
  		];
  	}

  	public function meta() {
  		return [
  		];
  	}

	public function providers() {
		return [];
	}
	public function alias() {
		return [];
	}

	public function install( $app ) {
		(new \Grape\Core\Database\CoreSchema)->up();
		$app->create($this->app());
	}

	public function uninstall($app) {		
		(new \Grape\Core\Database\CoreSchema)->down();
	}
}
