<?php
namespace App\Models;

use Exception;

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
        $query = "SELECT 
        IF(comments.id, COUNT(comments.id), 0) AS number,
            articles.*,
            users.name AS author_name
        FROM
            articles
                LEFT JOIN
            comments ON comments.id_articles = articles.id
                INNER JOIN
            users ON users.id = articles.author
        GROUP BY articles.id
        ORDER BY articles.date DESC
        LIMIT 3
        ";

        $resultArticles =  $this->conn->prepare($query);
        $resultArticles->execute();
        $return = $resultArticles->fetchAll();
        return $return;
        
    }   
    public function delet($id)
    {

        try {
            try {
                $this->conn = $this->connect();
                $query = "DELETE FROM articles WHERE id ='{$id}'";
                $resultArticles =  $this->conn->prepare($query);
                
                $resultArticles->execute();
                
                if(!$resultArticles->execute()){
                    throw new Exception('false'); 
                }
                throw new Exception('true');
                
            } catch (Exception $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }


    } 
}