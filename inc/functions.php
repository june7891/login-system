<?php

function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

function only_logged(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['id'])){
        flash("Access denied", "Vous n'avez pas le droit d'accéder à cette page");
        header('Location: login.php');
        exit();
    }
}