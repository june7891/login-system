<?php
require_once '../data/Database.php';
require_once '../inc/functions.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM users WHERE email = :email OR username = :username');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
    public function findUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public function register($data){
        $this->db->query('INSERT INTO users (username, password, email) 
        VALUES (:username, :password, :email)');
        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


   


    public function reset($data, $id){

        
        
        $this->db->query("UPDATE users SET password = :password WHERE id = $id");
        //Bind values
        $this->db->bind(':password', $data['new-password']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

   
    //Remind Password
    public function remindPassword($data, $email){
        $row = $this->findUserByEmail($email);
    

        if($row == false){
            return false;
        } else {
            $reset_token = str_random(60);
            $this->db->query('UPDATE users SET reset_token = :reset_token, reset_at = NOW() WHERE email = :email'); 
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':reset_token', $reset_token);
        }

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function updateAccount($data){


     
        $this->db->query("UPDATE users SET firstname = :firstname, lastname = :lastname, phoneNumber = :phoneNumber, dateOfBirth = :dateOfBirth, address = :address, gender = :gender WHERE id = :id");
        //Bind values

        
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':phoneNumber', $data['phoneNumber']);
        $this->db->bind(':dateOfBirth', $data['dateOfBirth']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':gender', $data['gender']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}