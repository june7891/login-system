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
        $images = $this->imageManager->getImages();
  
        require "views/gallery.view.php";
    }else {
        throw new Exception("Access forbiden");
    }
   }
  
   public function deleteProduct(){
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

   public function addProductTemplate(){
    if(Security::verifAccessSession()){
        $categoriesManager = new CategoriesManager();
        $categories = $categoriesManager->getCategory();
       
        require_once "views/addProduct.view.php";
    }else {
        throw new Exception("Access forbiden");
    }
   }
   public function addProduct(){
    if(Security::verifAccessSession()){
        $title = Security::secureHTML($_POST['title']);
        $image="";
        if($_FILES['image']['size'] > 0){
            $repertoire = "public/images/";
            $image = ajoutImage($_FILES['image'],$repertoire);
        }
        
        $description = Security::secureHTML($_POST['description']);
        $price = Security::secureHTML($_POST['price']);
      
        $id_product = $this->imageManager->AddDbProduct($image, $title, $description, $price);

        $categoriesManager = new CategoriesManager();
        if(!empty($_POST['category-1']))
            $categoriesManager->addCategoryToProduct($id_product);
        if(!empty($_POST['category-2']))
            $categoriesManager->addCategoryToProduct($id_product);
        if(!empty($_POST['category-3']))
            $categoriesManager->addCategoryToProduct($id_product);
        if(!empty($_POST['category-4']))
            $categoriesManager->addCategoryToProduct($id_product);
        if(!empty($_POST['category-5']))
            $categoriesManager->addCategoryToProduct($id_product);
        if(!empty($_POST['category-6']))
            $categoriesManager->addCategoryToProduct($id_product);
        
        header('Location: '.URL.'back/catalogue/show');

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