<?php
header("Access-Control-Allow-Origin: *");
require "controllers/Security.class.php";
require "models/UserManager.php";
require_once "utils/functions.php";


class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }


    // création compte utilisateur/inscription



    public function getRegisterUserPage()
    {
        require_once "views/signup.view.php";
    }



    public function registerUser()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "POST") {
            $username = Security::secureHTML($_POST['username']);
            $email = Security::secureHTML($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $confirm_password = Security::secureHTML($_POST['confirm_password']);
        }


        //verifie si tous les champs sont renseignés
        if (
            empty($_POST['username']) || empty($_POST['email']) ||
            empty($_POST['password']) || empty($_POST['confirm_password'])
        ) {
            flash("register", "Veullez remplir tous les champs!");

            header('Location: ' . URL . "signup");
        } elseif

        //vérifie si email valide
        (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Email n'est pas valide");

            header('Location: ' . URL . "signup");
        } elseif


        //verifie le mot de passe

        (strlen($_POST['password']) < 6) {
            flash("register", "Mot de passe n'est pas valide");
            header('Location: ' . URL . "signup");
        } else if ($_POST['password'] !== $_POST['confirm_password']) {
            flash("register", "Les mots de passe ne correspondent pas");
            header('Location: ' . URL . "signup");
        } elseif

        //vérifie si user existe déjà
        ($this->userManager->findUserByEmailOrUsername($_POST['email'], $_POST['username'])) {
            flash("register", "Pseudo ou mot de passe déjà pris");
            header('Location: ' . URL . "signup");
        } else {
            $user = $this->userManager->registerUserDb($username, $email, $password);
            header('Location: ' . URL . "login");
        }
    }


    //Mettre à jour le profil utilisateur

    public function getUserAccount()
    {

        if (Security::verifAccessSession()) {
            $user = $this->userManager->getUserById($_SESSION['id']);
            require "views/account.view.php";
        } else {

            header('Location: ' . URL . "login");
        }
    }




    public function updateAccount()
    {

        if (Security::verifAccessSession()) {
            $id_user = (int)Security::secureHTML($_POST['id_user']) ?? "";
            $email = Security::secureHTML($_POST['email']) ?? "";
            $username = Security::secureHTML($_POST['pseudo']) ?? "";
            $firstname = Security::secureHTML($_POST['firstname']) ?? "";
            $lastname = Security::secureHTML($_POST['lastname']) ?? "";
            $phoneNumber = Security::secureHTML($_POST['phoneNumber']) ?? "";
            $dateOfBirth = Security::secureHTML($_POST['dateOfBirth']) ?? "";
            $address = Security::secureHTML($_POST['address']) ?? "";
            $occupation = Security::secureHTML($_POST['occupation']) ?? "";


            $profilePhoto = $this->userManager->getProfilePhoto($id_user);
            if ($_FILES['image']['size'] > 0) {
                $repertoire = "public/images/";
                $profilePhoto = ajoutImage($_FILES['image'], $repertoire);
                // error_reporting(E_ALL ^ E_NOTICE);
            }

            $this->userManager->updateDbAccount($id_user, $username, $email,  $firstname, $lastname, $dateOfBirth, $address, $phoneNumber, $occupation, $profilePhoto);


            $user = $this->userManager->getUserById($id_user);


            // require "views/account.view.php";

            header('Location: ' . URL . 'account/show/profile');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }





    // connexion/login


    public function getLoginPage()
    {
        require_once "views/login.view.php";
    }


    public function connection()
    {
        if (!empty($_POST['username/email']) && !empty($_POST["password"])) {
            $username = Security::secureHTML($_POST['username/email']);
            $email = Security::secureHTML($_POST['username/email']);
            // $password = Security::secureHTML($_POST['password']);

            //vérifie si user existe
            if ($this->userManager->findUserByEmailOrUsername($username, $email)) {
                $loggedInUser = $this->userManager->login($_POST['username/email'], $_POST['password']);
                if ($loggedInUser) {
                    //Create session
                    $_SESSION['access'] = "loggedUser";
                    Security::createUserSession($loggedInUser);
                } else {
                    flash("login", "Pseudo ou mot de passe incorrect!");
                    header('Location: ' . URL . "login");
                }
            } else {
                flash("login", "Pseudo/email n'existe pas");
                header('Location: ' . URL . "login");
            }
        } else {
            flash('login', "Veuillez remplir tous les champs!");
            header('Location: ' . URL . "login");
        }
    }


    // logout

    public function deconnection()
    {
        session_destroy();
        header('Location: ' . URL . "accueil");
    }





    // mot de passe oublié

    public function remindPasswordTemplate()
    {
        require "views/remindPassword.view.php";
    }



    public function remindPasswordValidation()
    {
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            require "views/messageValidationPassword.view.php";
        } else {
            flash('remind', "Veuillez remplir tous les champs!");
            require "views/remindPassword.view.php";
        }
    }



    public function deleteAccount($id_user)
    {


        $id_user = (int)Security::secureHTML($_SESSION['id']);
        $this->userManager->deleteDbAccount($id_user);
        session_destroy();

        require "views/accountDeleted.view.php";
    }



    public function getCardTriper()
    {

        if (Security::verifAccessSession()) {
            $id_user = (int)Security::secureHTML($_SESSION['id']);
            $user = $this->userManager->getUserById($id_user);
            require "views/cardTriper.view.php";
        } else {
            header('Location: ' . URL . "login"); 
        }
       
    }
}
