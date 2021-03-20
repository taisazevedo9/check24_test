<?php
namespace Core;
/**
 * Description of ConfigView
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class ConfigView
{
    private string $name;
    private array $data;

    public function __construct($name,array $data)
    {
        $this->name = $name;
        $this->data = $data;
        
    }
    public function renderView()
    {
        if(file_exists('app/'.$this->name.'.php')){
            include 'app/'.$this->name.'.php';
        }else{
            echo "erro ao carrecar pagina";
            
        }
    }
}