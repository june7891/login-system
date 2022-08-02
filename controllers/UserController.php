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


    // création compte utilisateur/inscription



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
            $user = $this->userManager->registerUserDb($username, $email, $password, $account_created_at); 
            header('Location: '.URL."login");
        }
    
        
    }


    //Mettre à jour le profil utilisateur

    public function getUserAccount(){

        if(Security::verifAccessSession()){
            $user= $this->userManager->getUserById($_SESSION['id']);
            require "views/account.view.php";
        }else {
         
            header('Location: '.URL."login");
        }
        
        
    }

    public function getUpdateAccountTemplate() {
        if(Security::verifAccessSession()){
            $user= $this->userManager->getUserById($_SESSION['id']);
            require "views/modify-account.view.php";
        }else {
         
            header('Location: '.URL."login");
        }
    }


    public function updateAccount($id_user){

        if(Security::verifAccessSession()){
            $id_user = (int)Security::secureHTML($_POST['id_user']);
            $firstname = Security::secureHTML($_POST['firstname']);
            $lastname = Security::secureHTML($_POST['lastname']);
            $phoneNumber = Security::secureHTML($_POST['phoneNumber']);
            $dateOfBirth = Security::secureHTML($_POST['dateOfBirth']);
            $address = Security::secureHTML($_POST['address']);
            $gender = Security::secureHTML($_POST['gender']);


            $profilePhoto="";
            if($_FILES['image']['size'] > 0){
                $repertoire = "public/images/";
                $profilePhoto = ajoutImage($_FILES['image'],$repertoire);
            }
         
            $this->userManager->updateDbAccount($id_user, $firstname, $lastname, $phoneNumber, $dateOfBirth, $address, $gender, $profilePhoto);
          

            $user= $this->userManager->getUserById($_SESSION['id']);

            
            require "views/account.view.php";
        
            //header('Location: '.URL.'account/show');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }

    }




    public function updateUsernameEmail() {
        echo "modifier le pseudo ou mot de passe";
    }
   



    // connexion/login

    
    public function getLoginPage(){
        require_once "views/login.view.php";
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
                flash("login", "Pseudo ou mot de passe incorrect!");
                header('Location: '.URL."login");
            }
        }else{
            flash("login", "Pseudo/email n'existe pas");
            header('Location: '.URL."login");
        }
    }else {
        flash('login', "Veuillez remplir tous les champs!");
        header('Location: '.URL."login");
       }
    }
    

    // logout

    public function deconnection(){
       session_destroy();
       header('Location: '.URL."login");
       
       
    }


    // page d'accueil utilisateur



    public function getUserHomepage(){

        if(Security::verifAccessSession()){
            //$username = $_SESSION['username'];
           $user =  $this->userManager->getUserByid($_SESSION['id']);
              
            require "views/homepage.view.php";
        }else {
            header('Location: '.URL."login");
        }
        
        
    }
 


    // mot de passe oublié

    public function remindPasswordTemplate() {
        require "views/remindPassword.view.php";
    }



    public function remindPasswordValidation() {
        require "views/messageValidationPassword.view.php";
    }
 
    

}


