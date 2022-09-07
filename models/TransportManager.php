<?php

class TransportManager
{

    public function getCarsByLocation($originCity, $departureDate, $returnDate, $destinationCity)
    {


        $curl = curl_init();
        $originCityName = substr($originCity, 4, 11);
        $destinationCityName = substr($destinationCity, 4, 11);


        // print_r($originCityName);
        // print_r($destinationCityName);




        curl_setopt_array($curl, [
            CURLOPT_URL =>  "https://priceline-com-provider.p.rapidapi.com/v2/cars/resultsRequest?dropoff_time=10%3A00&dropoff_date=" . $returnDate . "&pickup_time=10%3A00&pickup_date=" . $departureDate . "&dropoff_city_string=" . $destinationCityName . "&pickup_city_string=" . $originCityName,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                "X-RapidAPI-Key: ff0109ff59msh2c89c3ce577dc1ap1b62bdjsn8f2cb3ebb783"
            ],
        ]);




        $response = curl_exec($curl);

        $err = curl_error($curl);

        $format = json_decode($response, true);

        curl_close($curl);

        // print_r($format['getCarResultsRequest']['results']['car_companies']['company_0']['name']);

        // print_r($format['getCarResultsRequest']['results']['results_list']['result_0']['car']['example']);
        // print_r($format['getCarResultsRequest']['results']['results_list']["result_0"]['car']['description']);
        // print_r($format['getCarResultsRequest']['results']['results_list']["result_0"]['car']['type']);
        // print_r($format['getCarResultsRequest']['results']['results_list']["result_0"]['car']['passengers']);
        // print_r($format['getCarResultsRequest']['results']['results_list']["result_0"]['price_details']['source']['total_price']);



        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return ($format);
        }
    }


    // 	$curl = curl_init();

    //     $originCityName = substr($originCity, 10);


    // 	curl_setopt_array($curl, [
    // 		CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v1/cars-rentals/locations?name=". $originCityName, 
    // 		CURLOPT_SSL_VERIFYPEER => false,
    // 		CURLOPT_RETURNTRANSFER => true,
    // 		CURLOPT_FOLLOWLOCATION => true,
    // 		CURLOPT_ENCODING => "",
    // 		CURLOPT_MAXREDIRS => 10,
    // 		CURLOPT_TIMEOUT => 30,
    // 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // 		CURLOPT_CUSTOMREQUEST => "GET",
    // 		CURLOPT_HTTPHEADER => [
    // 			"X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
    // 			"X-RapidAPI-Key: dcaf319b7cmsh60561c7268d4e4ap1a2672jsna2615b3a92dd"
    // 		],
    // 	]);

    // 	$result = curl_exec($curl);
    // 	$err = curl_error($curl);

    // 	$format = json_decode($result,true);


    // 	curl_close($curl);

    //     print_r($format [0]['cityName'] );
    //     die();

    // 	if ($err) {
    //     	echo "cURL Error #:" . $err;
    // 	} else {

    //     	return $format;

    // 	}
    // }

    public function getFlightByDepartureReturnPeople($departureDate, $returnDate, $adults, $children, $originCity, $destinationCity)
    {



        $curl = curl_init();
        $originCityCode = substr($originCity, 0, 3);
        $destinationCityCode = substr($destinationCity, 0, 3);

        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $departureDate . "&adults=" . $adults . "&children=" . $children . "&origin_airport_code=" . $originCityCode . "&destination_airport_code=" . $destinationCityCode,
            //CURLOPT_URL =>"https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=2023-06-21&adults=1&origin_airport_code=YWG&destination_airport_code=JFK",
            //CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/roundTrip?departure_date=".$departureDate."%2C". $returnDate."&adults=". $adults . "&sid=iSiX639&children=". $children ."&origin_airport_code=". $originCity. "%2C".$destinationCity ."&destination_airport_code=".$destinationCity ."%2C". $originCity,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                "X-RapidAPI-Key: ff0109ff59msh2c89c3ce577dc1ap1b62bdjsn8f2cb3ebb783"
            ],


        ]);

        //Exécutez la requête 
        $result1 = curl_exec($curl);
        $err1 = curl_error($curl);

        $format1 = json_decode($result1, true);

        curl_close($curl);

        //Afficher le résultat
        //$itemName = $format[0];

        //print_r($profiles[0]['name']);



        //second appel API Second vol à partir de la cité de d'arrivé

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $returnDate . "&adults=" . $adults . "&children=" . $children . "&origin_airport_code=" . $destinationCity . "&destination_airport_code=" . $originCity,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                "X-RapidAPI-Key: ff0109ff59msh2c89c3ce577dc1ap1b62bdjsn8f2cb3ebb783"
            ],


        ]);


        $result2 = curl_exec($curl);
        $err2 = curl_error($curl);

        $format2 = json_decode($result2, true);

        $formatFlights = $format1 + $format2;


        curl_close($curl);

        if ($err1 || $err2) {
            echo "cURL Error #:" . $err2 . $err1;
        } else {

            //print_r($format);
            return $formatFlights;
        }
        //print_r($format);
    }

    public function getBusByOriginCity($originCityBus, $departure, $adults, $children, $endCityBus)
    {

        $curl = curl_init();
        $originCityBusId = substr($originCityBus, 15);
        $endCityBusId = substr($endCityBus, 15);



        print_r($originCityBusId . "/");
        print_r($endCityBusId . "/");
        print_r($departure . "/");
        print_r($adults . "/");

        die();


        curl_setopt_array($curl, [
            CURLOPT_URL => "https://flixbus.p.rapidapi.com/v1/search-trips?to_id=" . $endCityBusId . "&currency=EUR&departure_date=" . $departure . "&number_adult=" . $adults . "&from_id=" . $originCityBusId . "&search_by=cities",

            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: flixbus.p.rapidapi.com",
                "X-RapidAPI-Key: ff0109ff59msh2c89c3ce577dc1ap1b62bdjsn8f2cb3ebb783"
            ],
        ]);

        $result = curl_exec($curl);


        $err = curl_error($curl);

        $format = json_decode($result, true);


        curl_close($curl);



        $nameBusFrom = $format["0"]['from']['name'];
        $nameBusTo = $format["0"]['to']['name'];
        $busPrice = $format["0"]['items'][0]['price_total_sum'];
        $busStatus = $format["0"]['items'][0]['status'];
        $busTimeDuration = $format["0"]['items'][0]['duration'];
        $busAmenities = $format["0"]['items'][0]['amenities'][0][0];

        $busTabInfo = array(
            "nameBusFrom" => $nameBusFrom,
            "nameBusTo" => $nameBusTo,
            "busPrice" => $busPrice,
            "busStatus" => $busStatus,
            "busTimeDuration" => $busTimeDuration,
            "busAmenities" => $busAmenities,
        );




        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            //print_r($format);

            return $busTabInfo;
        }
    }
}
