<?php
namespace Grape\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Illuminate\Foundation\AliasLoader;

class Loader {

	protected static $app;

   protected $modules = [
   ];

	public function __construct( $app ) {
		self::$app   = $app;
	}

   public function DB() {
      return self::$app["grape"]->load("coredb");
   }

   /*
   * VALIDATION */
   public function isRunCore($table="apps") {

		if( (env("DB_HOST") == "127.0.0.1") && (env("DB_DATABASE") == "laravel") ) {
			return FALSE;
		}

		if( \Schema::hasTable( "drivers" )) {

			if( $this->DB()->has("core", "core")) {
				return ( $this->DB()->get("core", "core")->activated == 1);
			}
		}
		return FALSE;
	}

   /*
   * PROXY */
   public function httpProxy() {

      $DB = self::$app["grape"]->load("coredb");

      $modules   = config("app.modules");
      $modules   = array_keys(config("app.modules"));
      /*
      * CORE SYSTEM */
      $this->loadCore( config("app.core") );

      /*
      * MODULES */
      $this->loadModules(["library", "plugin", "package"]);

      /*
      * COMPONENTS */
      $this->loadComponents(["theme", "widget"]);
   }

   public function loadCore( $slug ) {

      if( !empty( ($core = $this->DB()->getCore($slug)) ) ) {
         $this->modules["core"] = $core;
      }
   }

   public function loadModules( $types ) {
      foreach ($types as $type ) {
         if( !empty( ( $modules = $this->DB()->getModules($type)) ) ) {
            foreach ( $modules as $module ) {
               $driver = $module->driver;
               if( class_exists( $driver ) && array_key_exists($type, $this->modules) ) {
                  $this->modules[$type][] = new $driver;
               }
            }
         }
      }
   }

   public function loadComponents( $types ) {
      foreach ($types as $type ) {
         if( !empty( ( $modules = $this->DB()->getModules($type)) ) ) {
            foreach ( $modules as $module ) {
               $driver = $module->driver;
               if( class_exists( $driver ) && array_key_exists($type, $this->modules) ) {
                  $driver = new $driver;
                  if( method_exists($driver, "app") ) {
                     $app  = $driver->app();
                     $this->modules[$type][$app["slug"]] = $driver;
                  }
               }
            }
         }
      }
   }

   /*
   * MODULE */
   public function module($key=null) {
      if( array_key_exists( $key, $this->modules ) ) {
         return $this->modules[$key];
      }

      return $this->modules;
   }

   public function moduleContainer($data=null, $value=null) {

      if( empty($data) ) return null;

      if( is_string($data) ) {
         if( !array_key_exists($data, $this->modules) ) {
            $this->modules[$data] = $value;
         }
      }
   }

	/*
	* ALIASES
	* Load Alias */
	public function loadAlias($alias=NULL) {

		if(!empty($alias) && is_array($alias)) {
			foreach ($alias as $alia => $class) {
				AliasLoader::getInstance()->alias($alia, $class);
			}
		}
	}

	/*
	* PROVIDERS
	* Load ServiceProvider */
	public function loadProviders($providers=[]) {
		if( !empty($providers) ) {
         if(!is_array($providers)) $providers = [$providers];

         foreach ($providers as $provider) {
            self::$app->register($provider);
         }
      }
	}

   /*
   * RUN
   * Iniciar modulo de forma manual */
	public function run($driver=NULL) {

      if( !empty($driver) ) {

         if(is_string($driver)) $driver = new $driver;

         if( method_exists($driver, "providers") ) {
            if( !empty( ($providers = $driver->providers()) ) ) {
               $this->loadProviders( $providers );
            }
         }

         if( method_exists($driver, "alias") ) {
            $this->loadAlias( $driver->alias() );
         }
      }
	}

   /*
   * START
   * Start Modules */
   public function startModules( $type ) {
      if( array_key_exists( $type, $this->modules ) ) {
         if( !empty( ($drivers = $this->modules[$type]) ) ){
            foreach ( $drivers as $driver ) {
               $this->run($driver);
            }
         }
      }
   }
}
