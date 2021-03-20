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
        LIMIT 10
        ";

        $resultArticles =  $this->conn->prepare($query);
        $resultArticles->execute();
        $return = $resultArticles->fetchAll();
        return $return;
        
    }    
}