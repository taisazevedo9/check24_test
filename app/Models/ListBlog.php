<?php
namespace App\Models;
/**
 * Description of ListBlog
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */
class ListBlog extends Conn
{
    private object $conn;

    public function list()
    {
        $this->conn = $this->connect();
        $query = "SELECT * FROM articles ORDER BY id DESC LIMIT 10";

        $resultArticles =  $this->conn->prepare($query);
        $resultArticles->execute();
        $return = $resultArticles->fetchAll();
        return $return;
        
    }    
}