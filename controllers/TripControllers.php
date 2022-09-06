<?php

require_once "models/TripManager.php";

class TripControllers
{

    private $TripManager;
    public function __construct()
    {

        $this->tripManager = new TripManager();
    }

    public function getForm()
    {

        require "views/formTrip.php";
    }
    public function getTripsByDepartureReturnPeople()
    {
        $departureDate =  $_POST['departureDate'] ?? '';
        $returnDate = $_POST['returnDate'] ?? '';
        $adults = $_POST['adults'] ?? '';
        $children = $_POST['children'] ?? '';
        $originCity = $_POST['originCity'] ?? '';
        $destinationCity = $_POST['destinationCity'] ?? '';
        $result = $this->tripManager->getTripsByDepartureReturnPeople($departureDate, $returnDate, $adults, $children, $originCity, $destinationCity);



        // $JsonTripResult = json_encode($result,true);
        require_once './views/resultTrip.php';
    }
}
