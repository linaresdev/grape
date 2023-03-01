<?php
namespace Grape\Install;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

	### HEADER
	public function info() {

		return [
			"name"			=> "Install",
			"author"		=> "Ing. Ramón A Linares Febles",
			"email"			=> "rlinares4381@gmail.com",
			"license"		=> "MIT",
			"support"		=> "http://www.iipec.net",
			"version"		=> "V-1.0",
			"description" 	=> "Install V-1.0",
		];
	}

	public function app() {
		return [
			"type"			=> "packages",
			"slug"			=> "install",
			"token"			=> NULL,
			"activated" 	=> 1,
		];
	}

	## KERNEL
	public function providers() {
		return [
			\Grape\Install\Providers\InstallServiceProvider::class,
			\Grape\Install\Providers\RouteServiceProvider::class,
		];
	}
	
	public function alias() { return []; }

	public function install($app) { }
	public function destroy($app) { }
}
