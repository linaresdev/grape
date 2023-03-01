<?php
namespace Grape\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\Core\Support\Bootstrap;

class Core {

	protected static $app;

   protected $installed = false;

	public function __construct( Bootstrap $app ) {
		self::$app = $app;
	}

   /* BOOTSTRAP
   * Coleccionador patron singleton */
	public function load( $key=NULL, $args=[], $params=[] ) {
		return self::$app->load( $this, $key, $args, $params );
	}

   public function init() {
      if($this->load("loader")->isRunCore()) {

         /* START
         * Autorizar instancia de los modulos */
         $this->installed = TRUE;

         /* CONTAINER
         * Contenedores de los modulos */
         foreach (config("app.modules") as $key => $value) {
            $this->load("loader")->moduleContainer($key, $value);
         }

         /* HTTP START
         * Poblar contenedores con los componentes habilitados */
         $this->load("loader")->httpProxy();
      }
   }

   public function startModules($type) {
      $this->load("loader")->startModules($type);
   }

   public function isRunning() {
      return $this->installed;
   }

   /* PATH
   * Con soporte para rutas etiquetadas */
   public function path($key=null) {
      return $this->load("urls")->path($key);
   }

   /* URL
   * Con soporte para url etiquetadas*/
   public function url($key=null) {
      return $this->load("urls")->url($key);
   }

   /*
   * MOUNT
   * Acessor para registrar drivers de los modulos */
   public function mount( $driver=null ) {
      return $this->load("loader")->mount( $driver );
   }


   /*
   * RUN
   * Acessor de inicio manual de modulos */
   public function run( $driver=null ) {
      return $this->load("loader")->run($driver);
   }

	/*
	* URLS */
	public function publicUrl($path=null, $parameters=[], $secure=null ) {
		return $this->load("url")->url($path, $parameters, $secure);
	}

	public function addUrl($taggs=[]) {
		return $this->load("urls")->addTag("urls", $taggs);
	}

	/*
	* PATH */
	// public function path($path=null) {
	// 	return $this->load("urls")->path($path);
	// }

	public function addPath($taggs=[]) {
		return $this->load("urls")->addTag("paths", $taggs);
	}

	/*
	* FINDER */
	public function find($source, $segment=1) {
		return $this->load("finder")->map($source, $segment);
	}

   /*
   * MODULE */
   public function module($slug=null) {
      return $this->load("loader")->module($slug);
   }

}
