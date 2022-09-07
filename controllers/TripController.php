<?php

require_once "models/TripManager.php";

class TripController
{

    private $TripManager;
    public function __construct()
    {

        $this->tripManager = new TripManager();
    }

    public function getTripsByDepartureReturnPeople()
    {
        $departureDate =  $_POST['departureDateTrip'] ?? '';
        $returnDate = $_POST['returnDateTrip'] ?? '';
        $adults = $_POST['adultsTrip'] ?? '';
        $children = $_POST['childrenTrip'] ?? '';
        $originCity = $_POST['originCityTrip'] ?? '';
        $destinationCity = $_POST['destinationCityTrip'] ?? '';
        $result = $this->tripManager->getTripsByDepartureReturnPeople($departureDate, $returnDate, $adults, $children, $originCity, $destinationCity);

        print_r($result);
        die();

        global $variableGloblaleVoyage;
        $variableGloblaleVoyage = $result;


        // $JsonTripResult = json_encode($result,true);
        require_once './views/resultTrip.php';
    }
}
