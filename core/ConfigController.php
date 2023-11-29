<?php

namespace Core;

/**
 * Recebe a URL e manipula
 * Carregar a CONTROLLER
 * @author André <dre.freitas23@gmail.com>
 */
class ConfigController extends Config
{

    /**@var string $url Recebe a URL do .htaccess */
    private string $url;

    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;
    private string $urlParameter;
    private string $classLoad;


    /**
     * Recebe a URL do .htaccess
     * Validar a URL
     */
    public function __construct()
    {
        $this->configAdm();
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            var_dump($this->url);
            $this->urlArray = explode("/", $this->url);
            var_dump($this->urlArray);

            if (isset($this->urlArray[0])) {
                $this->urlController = $this->urlArray[0];
            } else {
                $this->urlController = CONTROLLER;
            }


            if (isset($this->urlArray[1])) {
                $this->urlMetodo = $this->urlArray[1];
            } else {
                $this->urlMetodo = METODO;
            }
            
            if (isset($this->urlArray[2])) {
                $this->urlParameter = $this->urlArray[2];
            } else {
                $this->urlParameter = "";
            }
        }else{
            $this->urlController = CONTROLLERERRO;
            $this->urlMetodo = METODO;
            $this->urlParameter = "";
        }
        echo "Controller: {$this->urlController} <br>";
        echo "Metodo: {$this->urlMetodo} <br>";
        echo "Parametro: {$this->urlParameter} <br>"; 
    }

    /**
     * Carregar as Controllers
     * Instanciar as classes da controller e carregar o método
     *
     * @return void
     */
    public function loadPage()
    {
        echo "Carregar Página: {$this->urlController}<br>";

        $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        $classPage = new $this->classLoad;
        $classPage->{$this->urlMetodo}();
    }
}
