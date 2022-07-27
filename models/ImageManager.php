<?php
require_once "models/Model.php";

class ImageManager extends Model{
    
public function getImageIdbyUserId($id_user){
    $req = "SELECT image_id FROM user_images WHERE user_id = :id_user";
    $statement = $this->getConnexion()->prepare($req);
    $statement->bindValue(":id_user",$id_user,PDO::PARAM_INT);
    $statement->execute();


    $tabImage=$statement->fetchAll(PDO::FETCH_COLUMN);
    $statement->closeCursor();
    
    return $tabImage;
   
    
}



public function getImageInfo($image_id){

    $req = "SELECT * FROM images WHERE image_id = :id_image";
    $statement = $this->getConnexion()->prepare($req);
    $statement->bindValue(":id_image",$image_id,PDO::PARAM_INT);
    $statement->execute();
    $imageInfo=$statement->fetch(PDO::FETCH_ASSOC);

   
    //print_r($imageInfo);
 
    return $imageInfo;
}



    public function deleteDbImages($id_image){
        $req = "DELETE FROM images WHERE image_id = :id_image";
        $statement = $this->getConnexion()->prepare($req);
        $statement->bindValue(":id_image",$id_image,PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor(); 
        
    }
    
    public function deleteDBImageUser($id_user, $id_image){
        $req = "DELETE FROM user_images
        WHERE user_id = :id_user AND image_id = :id_image";
        $stmt = $this->getConnexion()->prepare($req);
        $stmt->bindValue(":id_user",$id_user,PDO::PARAM_INT);
        $stmt->bindValue(":id_image",$id_image,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function addDbImage($image,$title){
        $req = "INSERT INTO images (image_name, image_title) VALUES (:image_name, :image_title)";
        $statement = $this->getConnexion()->prepare($req);
        
        $statement->bindValue(":image_name",$image,PDO::PARAM_STR);
        $statement->bindValue(":image_title",$title,PDO::PARAM_STR);     
        $statement->execute();
        $statement->closeCursor(); 

        return $this->getConnexion()->lastInsertId();
    }


    public function addImageToUser($id_user, $id_image){
        $req ="INSERT INTO user_images (user_id, image_id)
        VALUES (:id_user, :id_image)";
        $stmt = $this->getConnexion()->prepare($req);
        $stmt->bindValue(":id_user",$id_user,PDO::PARAM_INT);
        $stmt->bindValue(":id_image",$id_image,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
    

    public function updateImage($id,$image_name){
        $req ="UPDATE images 
        SET image_name = :image, title = :title
        WHERE id= :id";
        $stmt = $this->getConnexion()->prepare($req);
    }

   

    public function getImage($id_image){
        $req = "SELECT *from images WHERE id = :id_image";
        $stmt = $this->getConnexion()->prepare($req);
        $stmt->bindValue(":id_image",$id_image,PDO::PARAM_INT);
        $stmt->execute();
        $lignesImage = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $lignesImage;
    }
    

}