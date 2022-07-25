<?php
require_once "models/Model.php";

class UserManager extends Model{





    public function registerUserDb($username, $email, $password){
    $req = "INSERT INTO users (username, password, email) 
    VALUES (:username, :password, :email)";
    $statement = $this->getConnexion()->prepare($req);
    $statement->bindValue(":username",$username,PDO::PARAM_STR);
    $statement->bindValue(":email",$email,PDO::PARAM_STR);
    $statement->bindValue(":password",$password,PDO::PARAM_STR);
    $statement->execute();
    }



    private function getPasswordUser($username, $email){
        $req = "SELECT * FROM users WHERE username = :username OR email = :email";
        $statement = $this->getConnexion()->prepare($req);
        $statement->bindValue(":username",$username,PDO::PARAM_STR);
        $statement->bindValue(":email",$email,PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $user['password'];
    }

    public function isConnexionValid($username, $email, $password){
        $passwordBd = $this->getPasswordUser($username, $email);
        return password_verify($password, $passwordBd);
    }
    

    public function findUserByEmailOrUsername($email, $username){
       $req = 'SELECT * FROM users WHERE email = :email OR username = :username';
       $statement = $this->getConnexion()->prepare($req);
       $statement->bindValue(":username",$username,PDO::PARAM_STR);
       $statement->bindValue(":email",$email,PDO::PARAM_STR);
       $statement->execute();
       $user = $statement->fetch(PDO::FETCH_OBJ);
       $statement->closeCursor();

        return $user;
    }

    public function login($nameOrEmail, $password){
        $user = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

      

        $hashedPassword = $user->password;
        if(password_verify($password, $hashedPassword)){
            return $user;
        }else{
            return false;
        }
    }

}