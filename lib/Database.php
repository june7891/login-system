<?php

class DatabaseConnection {
    
    public ?PDO $database = null;
    
    public function getConnection(): PDO {
       if($this->database === null) {
       $this->database = new PDO('mysql:host=localhost;dbname=espace_user;charset=utf8', 'root', 'afpa33'); 
    }  
    return $this->database;
    }

}