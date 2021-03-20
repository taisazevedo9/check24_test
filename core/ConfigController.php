<?php
namespace Core;
/**
 * Description of ConfigController
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class ConfigController
{

    private string $url; 
    private array $urlSet;
    private string $urlMethod;
    private string $urlController;

    public function __construct()
    {
        if(!empty(filter_input(INPUT_GET,"url",FILTER_DEFAULT))){

        $this->url = filter_input(INPUT_GET,"url",FILTER_DEFAULT);
        $this->urlSet =  explode("/",$this->url);
        

        if((isset($this->urlSet[0])) && (isset($this->urlSet[1]))){
            $this->urlController = $this->urlSet[0];
            $this->urlMethod = $this->urlSet[1];
        }else{
            $this->urlController = "erro";
            $this->urlMethod = "index";
        }
            
            echo "Controller {$this->urlController} - {$this->urlMethod} ";
        }else{
            $this->urlController = "home";
            $this->urlMethod = "index";
            echo "acessar pagina interna {$this->urlController} - {$this->urlMethod} ";
        }
        
    }
    public function loadConfig()
    {
        $urlController = \ucwords($this->urlController);
        $classLoad = "\\App\\Controllers\\".$urlController;
        echo $classLoad;
        $classCharge = new $classLoad;
        $classCharge->index();
    }
}