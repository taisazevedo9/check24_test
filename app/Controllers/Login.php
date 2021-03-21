<?php
namespace App\Controllers;
use League\OAuth2\Client\Provider\Google; 
use Core\ConfigController as Home;
use Exception;

/**
 * Description of Login
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class Login
{
    private array $data;

    public function index()
    {
            $this->data['authUrl'] = $_SESSION['authUrlLogin'];
            unset($_SESSION['authUrlLogin']);

            $loadView = new \Core\ConfigView('Views/login/login',$this->data);
            $loadView->renderView();
   
    }
}