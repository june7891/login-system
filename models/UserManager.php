<?php
require_once "models/Model.php";

class UserManager extends Model{


    public function registerUserDb($username, $email, $password, $account_created_at){
    $req = "INSERT INTO users (username, password, email, account_created_at) 
    VALUES (:username, :password, :email, NOW())";
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

    public function getUserById($id_user){
        $req = 'SELECT * FROM users WHERE id = :id_user';
        $statement = $this->getConnexion()->prepare($req);
        $statement->bindValue(":id_user",$id_user,PDO::PARAM_INT);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;

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


    public function getProfilePhoto($id_user){
        $req = "SELECT profilePhoto FROM users WHERE id = :id_user";
        $statement = $this->getConnexion()->prepare($req);
        $statement->bindValue(":id_user",$id_user,PDO::PARAM_INT);
        $statement->execute();
        $profilePhoto=$statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
       
        return $profilePhoto['profilePhoto'];

    }



   public function updateDbAccount($id_user, $firstname, $lastname, $phoneNumber, $dateOfBirth, $address, $gender, $profilePhoto){
    $req ="UPDATE users SET firstname = :firstname, lastname = :lastname, phoneNumber = :phoneNumber, dateOfBirth = :dateOfBirth, address = :address, gender = :gender, profilePhoto = :profilePhoto WHERE id= :id_user";
    $stmt = $this->getConnexion()->prepare($req);

    $stmt->bindValue(":id_user",$id_user,PDO::PARAM_INT);
    $stmt->bindValue(":firstname",$firstname,PDO::PARAM_STR);
    $stmt->bindValue(":lastname",$lastname,PDO::PARAM_STR);
    $stmt->bindValue(":phoneNumber",$phoneNumber,PDO::PARAM_STR);
    $stmt->bindValue(":dateOfBirth",$dateOfBirth,PDO::PARAM_STR);
    $stmt->bindValue(":address",$address,PDO::PARAM_STR);
    $stmt->bindValue(":gender",$gender,PDO::PARAM_STR);
    $stmt->bindValue(":profilePhoto",$profilePhoto,PDO::PARAM_STR);
    $stmt->execute();   
    $stmt->closeCursor();
   }




}