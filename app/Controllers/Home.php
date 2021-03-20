<?php
namespace App\Controllers;
/**
 * Description of Home
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class Home
{
    public function index()
    {
        $listArticle = new \App\Models\ListBlog();
        $this->data['articles'] = $listArticle->list();

        $loadView = new \Core\ConfigView('Views/home/home',$this->data);
        $loadView->renderView();
    }    
}