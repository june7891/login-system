<?php 
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once "controllers/UserController.php";
require_once "controllers/ImageController.php";


$userController = new UserController();
$imageController = new ImageController();




try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        if(empty($url[0])) throw new Exception ("La page n'existe pas");
        switch($url[0]){
            case "login": $userController->getLoginPage();
            break;
            case "signup": $userController->getRegisterUserPage();
            break;
            case "inscription": $userController->registerUser();
            break;
            case "logout": $userController->deconnection();
            break;
            case "connection": $userController->connection();
            break;  
            case "homepage": $userController->getUserHomepage();
            break;  
            case "account": 
            switch($url[1]){
                case "show" : $userController->getUserAccount();
                case "updateUsernameEmail": $userController->updateUsernameEmail();
                break;
                case "updateAccount": $userController->updateAccount($url[2]);
                break; 
            }

            break;  
            case "remindPassword": $userController->remindPasswordTemplate();
            break;  
            case "remindPasswordValidation": $userController->remindPasswordValidation();
            break;  
            case "gallery": 
                switch($url[1]){
                    case "show": $imageController->showImages();
                    break;
                    case "add": $imageController->addImageTemplate();
                    break;
                    case "addValidation": $imageController->addImage();
                    break;
                    case "modification": $imageController->modification($url[2]);
                    break;
                    case "modificationValidation" : $imageController->modificationValidation();
                    break;
                    case "validationSuppression": $imageController->deleteImage();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                    
                }                
            break;
            default : throw new Exception ("La page n'existe pas");
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
   
}