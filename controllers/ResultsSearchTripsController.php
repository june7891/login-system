<?php
require_once "models/TripManager.php";

class ResultsSearchTripsController {

private $TripManager;

public function __construct(){

$this -> tripmanager = new TripManager();

}

public function getResults(){

require "views/resultsSearchTrips.php";

}
    
}
















