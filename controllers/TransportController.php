<?php

require_once 'models/TransportManager.php';



class TransportController
{


    private $transportManager;


    public function __construct()
    {
        $this->transportManager = new TransportManager();
    }


    public function getBusByLocation()
    {
        $originCityBus =  $_POST['originCity'] ?? '';
        $adults =  $_POST['adults'] ?? '';
        $departure =  $_POST['departureDate'] ?? '';
        $endCityBus =  $_POST['destinationCity'] ?? '';
        $children =  $_POST['children'] ?? '';


        $result = $this->transportManager->getBusByOriginCity($originCityBus, $departure, $adults, $children, $endCityBus);

        //$result = json_encode($result, true);
        return $result;
        //require_once './views/result.php';
    }

    public function getCarsByLocation()
    {
        $originCity =  $_POST['originCity'] ?? '';
        $departureDate =  $_POST['departureDate'] ?? '';
        $returnDate =  $_POST['returnDate'] ?? '';
        $destinationCity =  $_POST['destinationCity'] ?? '';
        $result = $this->transportManager->getCarsByLocation($originCity, $departureDate, $returnDate, $destinationCity);
        return $result;
        //require_once './views/result.php';
    }

    public function getFlightsByDepartureReturnPeople()
    {

        $departureDate =  $_POST['departureDate'] ?? '';
        $returnDate = $_POST['returnDate'] ?? '';
        $adults = $_POST['adults'] ?? '';
        $children = $_POST['children'] ?? '';
        $originCity = $_POST['originCity'] ?? '';
        $destinationCity = $_POST['destinationCity'] ?? '';



        $result = $this->transportManager->getFlightByDepartureReturnPeople($departureDate, $returnDate, $adults, $children, $originCity, $destinationCity);
        return $result;
        //require_once './views/result.php';
    }

    public function getTransports()
    {


        $resultGlobalTransports = $this->getFlightsByDepartureReturnPeople() + $this->getCarsByLocation() + $this->getBusByLocation();
        //$resultGlobalTransports =$this->getBusByLocation();
        //$resultGlobalTransports = $this->getCarsByLocation() ; 
        $results = json_encode($resultGlobalTransports, true);

        //print_r($resultGlobalTransports["getCarsByLocation"]);
        //die(); 

        require_once './views/resultTransport.php';
    }
}
