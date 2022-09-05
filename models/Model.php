<?php
abstract class Model {
    private static $pdo;

    private static function setConnexion(){
        self::$pdo = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8', 'root', 'afpa33');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    
    protected function getConnexion(){
        if(self::$pdo === null){
            self::setConnexion();
        }
        return self::$pdo;
    }


    public static function sendJSON($info){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        echo json_encode($info);
        
    }
    
}