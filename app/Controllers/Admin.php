<?php
namespace App\Controllers;
/**
 * Description of Admin
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class Admin
{
    private array $data;
    
    public function index()
    {
        $listArticle = new \App\Models\ListBlog();
        $this->data['articles'] = $listArticle->list();
        $this->data['name'] = $_SESSION["userLogin"]->getFirstName();
        
        $loadView = new \Core\ConfigView('Views/admin/admin',$this->data);
        $loadView->renderView();
    }    
    public function delete($id)
    {

        $listArticle = new \App\Models\ListBlog();
        $delets = $listArticle->delet($id);
        
        $this->data['message'] = $delets;
        $this->data['name'] = $_SESSION["userLogin"]->getFirstName();
        header('Content-type: application/json');
        echo json_encode($this->data);
    } 
    
}