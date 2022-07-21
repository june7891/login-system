<?php
require_once '../data/Database.php';
require_once '../inc/functions.php';

class Image
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function upload($data, $user_id) {

        $this->db->query("INSERT INTO images (name, image_url, title, image_date, user_id) 
        VALUES (:name, :image_url, :title, $user_id)");
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':title', $data['title']);
   


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }



    
}

//SELECT * FROM images WHERE user_id = $user_id session pour recuperer les images de l'user connecté

// $uploadImage = $bdd->prepare('INSERT INTO images (name, image_url, title) VALUES (?, ?, ?)');
// 				$uploadImage->execute(array($new_img_name, $img_upload_path, $title));