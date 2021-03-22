<?php
namespace App\Controllers;
/**
 * Description of Blog
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class Blog
{
    private array $data;
    
    public function index()
    {
        $listArticle = new \App\Models\ListBlog();
        $this->data['articles'] = $listArticle->list();

        $loadView = new \Core\ConfigView('Views/blog/listArticles',$this->data);
        $loadView->renderView();
    }
    public function create()
    {
        var_dump('asç,asdçds');die;
    }    


}