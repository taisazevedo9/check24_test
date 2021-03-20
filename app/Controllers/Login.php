<?php
namespace App\Controllers;
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
        $listArticle = new \App\Models\ListBlog();
        $this->data['articles'] = $listArticle->list();

        $loadView = new \Core\ConfigView('Views/login/login',$this->data);
        $loadView->renderView();
    }    
}