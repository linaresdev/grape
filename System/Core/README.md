# CORE

## Run Level 
### Niveles de ejecución desde el registro.
- [0] Core.
- [1] Library.
- [2] Package.
- [3] Plugins.

### Niveles de ejecución desde el boot.
- [4] Themes.
- [5] Widgets.

### Iniciando el core

```php

    Grape::init();

    ## Grape init ejecuta lo siguiente
    public function init() {
        if($this->load("loader")->isRunCore()) {

            /* START
            * Autorizar instancia de los modulos */
            $this->installed = TRUE;

            /* CONTAINER
            * Cargar lista de los contenedores permitidos para los modulos */
            foreach (config("app.modules") as $key => $value) {
                $this->load("loader")->moduleContainer($key, $value);
            }

            /* HTTP START
            * Poblar contenedores con los componentes habilitados */
            $this->load("loader")->httpProxy();
        }
   }

```