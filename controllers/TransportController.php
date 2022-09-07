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
        $originCityBus =  $_POST['originCityTransport'] ?? '';
        $adults =  $_POST['adultsTransport'] ?? '';
        $departure =  $_POST['departureDateTransport'] ?? '';
        $endCityBus =  $_POST['destinationCityTransport'] ?? '';
        $children =  $_POST['childrenTransport'] ?? '';


        $result = $this->transportManager->getBusByOriginCity($originCityBus, $departure, $adults, $children, $endCityBus);

        //$result = json_encode($result, true);
        return $result;
        //require_once './views/result.php';
    }

    public function getCarsByLocation()
    {
        $originCity =  $_POST['originCityTransport'] ?? '';
        $departureDate =  $_POST['departureDateTransport'] ?? '';
        $returnDate =  $_POST['returnDateTransport'] ?? '';
        $destinationCity =  $_POST['destinationCityTransport'] ?? '';
        $result = $this->transportManager->getCarsByLocation($originCity, $departureDate, $returnDate, $destinationCity);
        return $result;
        //require_once './views/result.php';
    }

    public function getFlightsByDepartureReturnPeople()
    {

        $departureDate =  $_POST['departureDateTransport'] ?? '';
        $returnDate = $_POST['returnDateTransport'] ?? '';
        $adults = $_POST['adultsTransport'] ?? '';
        $children = $_POST['childrenTransport'] ?? '';
        $originCity = $_POST['originCityTransport'] ?? '';
        $destinationCity = $_POST['destinationCityTransport'] ?? '';



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
