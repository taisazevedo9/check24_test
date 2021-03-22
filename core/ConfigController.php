<?php
namespace Core;

use Exception;
use GuzzleHttp\RedirectMiddleware;

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
    private string $urlDefault = 'http://localhost/check24_test/home/';
    private string $urlParam;
    
    
    public function __construct()
    {
        if(!empty(filter_input(INPUT_GET,"url",FILTER_DEFAULT))){

        $this->url = filter_input(INPUT_GET,"url",FILTER_DEFAULT);

        // $pos = strpos($this->url, "/");
        
        if (strpos($this->url, "/") === false) {
            $this->url = $this->url."/";
        } 

        $this->urlSet =  explode("/",$this->url);
        
        if((isset($this->urlSet[0])) && (isset($this->urlSet[1]))){
            $this->urlController = $this->urlSet[0];
            $this->urlMethod = $this->urlSet[1];
        }else{
            $this->urlController = "erro";
            $this->urlMethod = "index";
        }
        
        if((isset($this->urlSet[0])) && (isset($this->urlSet[1])) && (isset($this->urlSet[2]))){
        
            $this->urlParam = $this->urlSet[2];
        }
            
        
        }else{
            $this->urlController = "home";
            $this->urlMethod = "index";
        }
        
        
    }
    public function loadConfig()
    {
        try{
            $urlController = \ucwords($this->urlController);
            $classLoad = "\\App\\Controllers\\".$urlController;
            
            if(($urlController !="Home") && empty($_SESSION['userLogin'])){
                
                header("Location: " .$this->urlDefault);
                exit;
            } 
            
            if (!class_exists($classLoad)) {
                
                throw new \Exception('route not found'); 
                header("Location: " .$this->urlDefault);
                exit;
            }
            $classLoadRes = new $classLoad;
            
            if((isset($this->urlParam)) && (isset($this->urlMethod))){
             
                $this->actions($classLoadRes);
            }else{
                $classLoadRes->index();
            }
            
        } catch (Exception $e) {

            header("Location: " .$this->urlDefault);
            exit;
        }
        
        
    }
    public function actions($classLoad)
    {
        
        switch ($this->urlMethod) {
            case "":  return $classLoad->index();
            case "index":  return $classLoad->index();
            case "delete": return $classLoad->delete($this->urlParam);
            case "create": return $classLoad->create();
            case "update": return $classLoad->update($this->urlParam);
            case "read":   return $classLoad->read($this->urlParam);
            case "default":  return $classLoad->index();
        }
      
    }
}