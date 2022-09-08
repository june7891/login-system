<?php
session_start();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$_SESSION["apikey"] = "X-RapidAPI-Key: dcaf319b7cmsh60561c7268d4e4ap1a2672jsna2615b3a92dd";
$_SESSION["apikey"] = "X-RapidAPI-Key: db3c40c6c0msh03543ebbef04675p192b54jsn73a09cd91e0d";



require_once "controllers/UserController.php";
require_once "controllers/ImageController.php";
require_once "controllers/MainController.php";
require_once 'controllers/tripController.php';
require_once 'controllers/TransportController.php';
require_once 'controllers/HebergementController.php';


$userController = new UserController();
$imageController = new ImageController();
$mainController = new MainController();
$tripController = new TripController();
$transportController = new TransportController();
$hebergementController = new HebergementController();




try {
    if (empty($_GET['page'])) {
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL)) ?? "";
        if (empty($url[0])) throw new Exception("La page n'existe pas");
        switch ($url[0]) {
            case "accueil":
                $mainController->getPageAccueil();
                break;
            case "about":
                $mainController->getPageAbout();
                break;
            case "contact":
                $mainController->getPageContact();
                break;
            case "mailSent":
                $mainController->getPageMailSent();
                break;
            case "app":
                $mainController->getPageApp();
                break;
            case "login":
                $userController->getLoginPage();
                break;
            case "signup":
                $userController->getRegisterUserPage();
                break;
            case "inscription":
                $userController->registerUser();
                break;
            case "logout":
                $userController->deconnection();
                break;
            case "connection":
                $userController->connection();
                break;

            case "account":
                switch ($url[1]) {
                    case "show":


                        switch ($url[2]) {
                            case "profile":
                                $userController->getUserAccount();
                                break;
                            case "updateAccount":
                                $userController->updateAccount();
                                break;
                            default:
                                throw new Exception("La page n'existe pas");
                        }

                        break;
                    case "deleteAccount":
                        $userController->deleteAccount($url[2]);
                        break;
                    case "cardTriper":
                        $userController->getCardTriper();
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }

                break;
            case "remindPassword":
                $userController->remindPasswordTemplate();
                break;
            case "remindPasswordValidation":
                $userController->remindPasswordValidation();
                break;
            case "gallery":
                switch ($url[1]) {
                    case "show":
                        $imageController->showImages();
                        break;
                    case "add":
                        $imageController->addImageTemplate();
                        break;
                    case "modify":
                        $imageController->galleryModificationTemplate();
                        break;
                    case "addValidation":
                        $imageController->addImage();
                        break;
                    case "modification":
                        $imageController->modification($url[2]);
                        break;
                    case "modificationValidation":
                        $imageController->modificationValidation();
                        break;
                    case "validationSuppression":
                        $imageController->deleteImage();
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
                break;
            case 'resultHebergement':
                $hebergementController->getHebergementsByLocation();
                break;
            case 'resultTrip':
                $tripController->getTripsByDepartureReturnPeople();
                break;
            case 'resultTransport':
                $transportController->getTransports();
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
}
