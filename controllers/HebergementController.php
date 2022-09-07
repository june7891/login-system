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
        $departureDate =  $_POST['departureDateHebergement'] ?? '';
        $returnDate = $_POST['returnDateHebergement'] ?? '';
        $adults = $_POST['adultsHebergement'] ?? '';
        //v2 avec un form qui spécifie les enfants
        $children = $_POST['childrenHebergement'] ?? '';
        $destinationCity = $_POST['destinationCityHebergement'] ?? '';
        $result = $this->HebergementManager->getHebergementsByLocation($departureDate, $returnDate, $adults, $children, $destinationCity);

        //à changer
        require_once './views/resultHebergement.php';
    }
}