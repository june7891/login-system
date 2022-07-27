<?php
require_once "controllers/Security.class.php";
require_once "utils/functions.php";
require_once "models/imageManager.php";


class ImageController{
    private $imageManager;
    
    public function __construct()
    {
        $this->imageManager = new ImageManager();
    }

   public function showImages(){
    if(Security::verifAccessSession()){
        $user_id = $_SESSION['id'];
       
        $tabIdImages= $this->imageManager->getImageIdByUserId($user_id);

        foreach($tabIdImages as $id_image) {
         $infoImage = $this->imageManager->getImageInfo($id_image);
        //  echo '<pre>';
        // print_r($infoImage);
        // echo "</pre>";
        // echo $infoImage["image_title"]; 
        };
 require "views/gallery.view.php";
        
    }else {
        throw new Exception("Access forbiden");
    }
   }
  



   public function deleteImage(){
    if(Security::verifAccessSession()){
        $id_product = (int)Security::secureHTML($_POST['id']);
        $image = $this->imageManager->getImageProduct($id_product);
        unlink("public/images/".$image);
        $this->imageManager->deleteDbProduct($id_product);
        header('Location: '.URL.'back/catalogue/show');
    
    }else {
        throw new Exception("Access forbiden");
    }
   }      

   public function addImageTemplate(){
    if(Security::verifAccessSession()){

        require_once "views/addImage.view.php";
    }else {
        throw new Exception("Access forbiden");
    }
   }
   public function addImage(){
    if(Security::verifAccessSession()){
        $id_user =  (int)Security::secureHTML($_POST['id']);
        $title = Security::secureHTML($_POST['title']);
        $image="";
        if($_FILES['image']['size'] > 0){
            $repertoire = "public/images/";
            $image = ajoutImage($_FILES['image'],$repertoire);
        }
        
      
      
        $id_image = $this->imageManager->addDbImage($title, $image);

        $this->imageManager->addImageToUser($id_user, $id_image);

            header('Location: '.URL.'gallery/show'); 

     
        
       

}else {
throw new Exception("Access forbiden");
}
}

public function modification($id_product){
    if(Security::verifAccessSession()){
        $categoriesManager = new CategoriesManager();
        $categories = $categoriesManager->getCategory();

        $lignesProduct= $this->imageManager->getProduct((int)Security::secureHTML($id_product));
        
       $tabCategory = [];

       foreach($lignesProduct as $category){
        $tabCategory[] = $category['id'];
       }
       

        require_once "views/productModification.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'être là ! ");
    }
}


    public function modificationValidation(){
        if(Security::verifAccessSession()){
            $id_product = Security::secureHTML($_POST['id']);
            $image = "";
            $title = Security::secureHTML($_POST['title']);
         
            $description = Security::secureHTML($_POST['description']);
            $price = Security::secureHTML($_POST['price']);
            $category = Security::secureHTML($_POST['category']);
            
            $this->imageManager->updateProduct($id_product, $image, $title, $description, $price, $category);
        
            $category = [
                1 => !empty($_POST['category-1']),
                2 => !empty($_POST['category-1']),
                3 => !empty($_POST['category-1']),
                4 => !empty($_POST['category-1']),
                5 => !empty($_POST['category-1']),
                6 => !empty($_POST['category-1'])
            ];
    
            header('Location: '.URL.'back/catalogue/show');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
}