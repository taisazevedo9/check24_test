<?php
namespace App\Models;

use Exception;
use PDO;

/**
 * Description of Conn
 * 
 * @author Tais Azevedo <azevedo.tais@yahoo.com.br>
 */

 class Conn
 {
     private string $db = "mysql";
     private string $host = "localhost";
     private string $user = "root";
     private string $pass = "";
     private string $dbname = "check24";
     public int $port = 3306;
     public object $connect;

     public function connect(){
         try{
            $this->connect = new PDO($this->db.':host='.$this->host.';port='.$this->port.';dbname='.$this->dbname,$this->user,$this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            return $this->connect;
         }catch(Exception $e){
            die('não conseguiu acessar');
         }
     }
 }