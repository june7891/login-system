<?php 

class MainController {

    public function getPageAccueil(){
        require_once "views/accueil.view.php";
    }

    public function getPageAbout() {
        require_once "views/about.view.php";
    }


public function getPageContact() {
        require_once "views/contact.view.php";
    }

public function getPageMailSent(){
        require_once "views/mailSent.view.php";
    }

public function getPageApp(){
        require_once "views/app.view.php";
    }


}
