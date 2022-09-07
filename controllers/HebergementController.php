<?php

require_once "models/HebergementManager.php";

class HebergementController
{
    private $HebergementManager;

    public function __construct()
    {

        $this->HebergementManager = new HebergementManager();
    }


    public function getHebergementsByLocation(){
        $departureDate =  $_POST['departureDate'] ?? '';
        $returnDate = $_POST['returnDate'] ?? '';
        $adults = $_POST['adults'] ?? '';
        //v2 avec un form qui spécifie les enfants
        $children = $_POST['children'] ?? '';
        $destinationCity = $_POST['destinationCity'] ?? '';
        $result = $this->HebergementManager->getHebergementsByLocation($departureDate, $returnDate, $adults, $children, $destinationCity);

        //à changer
        require_once './views/resultHebergement.php';
    }
}