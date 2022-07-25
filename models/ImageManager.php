<?php
require_once "models/Model.php";

class ImageManager extends Model{
    
public function getImages(){
    $req = "SELECT * FROM images";
    $statement = $this->getConnexion()->prepare($req);
    $statement->execute();
    $images=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $images;
    
}
    public function deleteDbImages($id_image){
        $req = "DELETE FROM images WHERE id = :id_images";
        $statement = $this->getConnexion()->prepare($req);
        $statement->bindValue(":id_image",$id_image,PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor(); 
        
    }
    

    public function addDbImage($image,$title, $user_id){
        $req = "INSERT INTO images (image_name, image_title, user_id) VALUES (:image_name, :image_title, :user_id)";
        $statement = $this->getConnexion()->prepare($req);
        
        $statement->bindValue(":image_name",$image,PDO::PARAM_STR);
        $statement->bindValue(":image_title",$title,PDO::PARAM_STR);
       
        $statement->bindValue(":user_id",$user_id,PDO::PARAM_INT);
     
        $statement->execute();
        $statement->closeCursor(); 
        return $this->getConnexion()->lastInsertId();
    }


   
    

    public function updateImage($id,$image_name){
        $req ="UPDATE images 
        SET image_name = :image, title = :title, description = :description,  price = :price, id_category = :category
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