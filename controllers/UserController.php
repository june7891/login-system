<?php
require "controllers/Security.class.php";
require "models/UserManager.php";
require_once "utils/functions.php";

class UserController{
    private $userManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function getLoginPage(){
        require_once "views/login.view.php";
    }


    public function getRegisterUserPage() {
        require_once "views/signup.view.php";

    }

    public function registerUser() {
        
        $username = Security::secureHTML($_POST['username']); 
        $email = Security::secureHTML($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $confirm_password = Security::secureHTML($_POST['confirm_password']);


        //verifie si tous les champs sont renseignés
        if(empty($_POST['username']) || empty($_POST['email']) || 
        empty($_POST['password']) || empty($_POST['confirm_password'])){
            flash("register", "Veullez remplir tous les champs!");
            
            header('Location: '.URL."signup");
        } elseif

        //vérifie si email valide
        (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            flash("register", "Email n'est pas valide");

            header('Location: '.URL."signup");
        }elseif


        //verifie le mot de passe

        (strlen($_POST['password']) < 6){
            flash("register", "Mot de passe n'est pas valide");
            header('Location: '.URL."signup");
        } else if($_POST['password'] !== $_POST['confirm_password']){
            flash("register", "Les mots de passe ne correspondent pas");
            header('Location: '.URL."signup");
        }elseif

         //vérifie si user existe déjà
         ($this->userManager->findUserByEmailOrUsername($_POST['email'], $_POST['username'])){
            flash("register", "Pseudo ou mot de passe déjà pris");
            header('Location: '.URL."signup");
        } else {
            $user = $this->userManager->registerUserDb($username, $email, $password); 
            header('Location: '.URL."login");
        }
    
       

        
    }



   




    public function connection(){
       if(!empty($_POST['username/email']) && !empty($_POST["password"])){
        $username = Security::secureHTML($_POST['username/email']);
        $email = Security::secureHTML($_POST['username/email']);
        $password = Security::secureHTML($_POST['password']);

        //vérifie si user existe
        if($this->userManager->findUserByEmailOrUsername($username, $email)){
            $loggedInUser = $this->userManager->login($_POST['username/email'], $_POST['password']);
            if($loggedInUser){
                //Create session
                $_SESSION['access'] = "loggedUser";
                Security::createUserSession($loggedInUser);
            }else{
                flash("login", "pb avec findUser");
                header('Location: '.URL."login");
            }
        }else{
            flash("login", "Ppb avec login()");
            header('Location: '.URL."login");
        }
    }else {
        flash('login', "Veuillez remplir tous les champs!");
        header('Location: '.URL."login");
       }
    }
    


    public function deconnection(){
       session_destroy();
       header('Location: '.URL."login");
       
       
    }

    public function getUserHomepage(){

        if(Security::verifAccessSession()){
            require "views/homepage.view.php";
        }else {
            flash('login', 'pb avec getUserHomepage');
            header('Location: '.URL."login");
        }
        
        
    }
    public function getUserAccount(){

        if(Security::verifAccessSession()){
            require "views/account.view.php";
        }else {
         
            header('Location: '.URL."login");
        }
        
        
    }

    

  
}