<?php
session_start();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$_SESSION["apikey"] = "X-RapidAPI-Key: dcaf319b7cmsh60561c7268d4e4ap1a2672jsna2615b3a92dd";



require_once "controllers/UserController.php";
require_once "controllers/ImageController.php";
require_once "controllers/MainController.php";
require_once 'controllers/tripController.php';
require_once 'controllers/TransportController.php';
<<<<<<< HEAD
require_once 'controllers/ResultsSearchTripsController.php';
=======
require_once 'controllers/HebergementController.php';
>>>>>>> 8988c21082cc1dc8bb2bf97bb9b6db3d1819ed94


$userController = new UserController();
$imageController = new ImageController();
$mainController = new MainController();
$tripController = new TripController();
$transportController = new TransportController();
<<<<<<< HEAD
$resultsSearchTripsController = new ResultsSearchTripsController();
=======
$hebergementController = new HebergementController();
>>>>>>> 8988c21082cc1dc8bb2bf97bb9b6db3d1819ed94




try {
    if (empty($_GET['page'])) {
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        if (empty($url[0])) throw new Exception("La page n'existe pas");
        switch ($url[0]) {
            case "accueil":
                $mainController->getPageAccueil();
                break;
<<<<<<< HEAD
            case "remy":
               echo "youpi";
=======
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
>>>>>>> 8988c21082cc1dc8bb2bf97bb9b6db3d1819ed94
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
            case "homepage":
                $userController->getUserHomepage();
                break;
            case "account":
                switch ($url[1]) {
                    case "show":
                        $userController->getUserAccount();

                    case "modifyAccount":
                        $userController->getUpdateAccountTemplate();
                        break;
                    case "updateAccount":
                        $userController->updateAccount($url[2]);
                        break;
                    case "deleteAccount":
                        $userController->deleteAccount($url[2]);
                        break;
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
            case "resultTransport":
                $transportController->getTransports();
                break;
            case "resultsSearchTrips":
                $resultsSearchTripsController->getResults();
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
}
