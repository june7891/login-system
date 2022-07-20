<?php

    require_once '../models/User.php';
    require_once '../helpers/session_helper.php';

    class Users {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        public function register(){
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);

            //Init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password'])
            ];

            //Validate inputs
            if(empty($data['username']) || empty($data['email']) || 
            empty($data['password']) || empty($data['confirm_password'])){
                flash("register", "Please fill out all inputs");
                redirect("../signup.php");
            }

          

            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                flash("register", "Invalid email");
                redirect("../signup.php");
            }

            if(strlen($data['password']) < 6){
                flash("register", "Invalid password");
                redirect("../signup.php");
            } else if($data['password'] !== $data['confirm_password']){
                flash("register", "Passwords don't match");
                redirect("../signup.php");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmailOrUsername($data['email'], $data['username'])){
                flash("register", "Username or email already taken");
                redirect("../signup.php");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //Register User
            if($this->userModel->register($data)){
                redirect("../login.php");
            }else{
                die("Something went wrong");
            }
        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'username/email' => trim($_POST['username/email']),
            'password' => trim($_POST['password'])
        ];

        if(empty($data['username/email']) || empty($data['password'])){
            flash("login", "Please fill out all inputs");
            header("location: ../login.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['username/email'], $data['username/email'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['username/email'], $data['password']);
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Password Incorrect");
                redirect("../login.php");
            }
        }else{
            flash("login", "utilisateur existe pas");
            redirect("../login.php");
        }
    }
    public function reset(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'new-password' => trim($_POST['new-password']),
            'repeat-new-password' => trim($_POST['repeat-new-password'])
        ];

        if(empty($data['new-password']) || empty($data['repeat-new-password'])){
            flash("reset", "Please fill out all inputs");
            header("location: ../reset-password.php");
            exit();
        }

        if(strlen($data['new-password']) < 6){
            flash("reset", "Invalid password");
            redirect("../reset-password.php");
        } else if($data['new-password'] !== $data['repeat-new-password']){
            flash("reset", "Passwords don't match");
            redirect("../reset.php");
        }

        $data['new-password'] = password_hash($data['new-password'], PASSWORD_DEFAULT);

         //Reset password
         if($this->userModel->reset($data)){
            redirect("../login.php");
        }else{
            die("Something went wrong");
        }

    }



    public function remind(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);
        $id = null;

        //Init data
        $data=[
            'email' => trim($_POST['email']),
            'id' => $this->userModel->findUserById($id)
        ];

        if(empty($data['email'])){
            flash("remind", "Please fill out all inputs");
            header("location: ../remind-password.php");
            exit();
        }

        if($this->userModel->findUserByEmail($data['email'])){
                if($this->userModel->remindPassword($data, $data['email'])) {
                   flash("remind", "Les instructions du rappel de mot de passe vous ont été envoyées par emails");
                   mail($data['email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost/login-system/reset-password-email.php?id={$id}&token=$reset_token");
                redirect("../login.php"); 
                } else {
                   die("Something went wrong"); 
                }
                
        }else {
            flash('remind', "Aucun compte ne correspond à cet adresse");
            header("location: ../remind-password.php");

        }



       
    }



    public function registerAccount(){
        //Process form
        
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);
        
        $id = $_SESSION['id'];
        //Init data
        $data = [
            'id'=>$id,
            'firstname' => htmlspecialchars($_POST['firstname']),
            'lastname' => htmlspecialchars($_POST['lastname']),
            'phoneNumber' => htmlspecialchars($_POST['phoneNumber']),
            'dateOfBirth' => htmlspecialchars($_POST['dateOfBirth']),
            'address' => htmlspecialchars($_POST['address']),
            'gender' => htmlspecialchars($_POST['gender'])
        ];

   
    
        if($this->userModel->registerAccount($data)){
            redirect("../index.php");
        }else{
            die("Something went wrong");
        }
    }


    public function createUserSession($user){
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        redirect("../index.php");
    }

    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        session_destroy();
        redirect("../index.php");
    }
}

    $init = new Users;

    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            case 'reset':
                $init->reset();
                break;
            case 'register-account':
                $init->registerAccount();
                break;
            case 'remind':
                $init->remind();
                break;
            default:
            redirect("../index.php");
        }
        
    }else{
        switch($_GET['q']){
            case 'logout':
                $init->logout();
                break;
            default:
            redirect("../index.php");
        }
    }

    