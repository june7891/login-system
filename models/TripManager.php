<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class TripManager
{




    public function getTripsByDepartureReturnPeople($departureDate, $returnDate, $adults, $children, $originCity, $destinationCity)
    {

        //------------------------------------------------------Appel API pour avions aller------------------------------------------------------


        $originCityCode = substr($originCity, 0, 3);
        $destinationCityCode = substr($destinationCity, 0, 3);






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
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $departureDate . "&adults=" . $adults . "&origin_airport_code=" . $originCityCode . "&destination_airport_code=" . $destinationCityCode,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $_SESSION['apikey']
            ],
        ]);




        $resultFlights1 = curl_exec($curl);
        $errFlight1 = curl_error($curl);

        $formatTabFlight1 = json_decode($resultFlights1, true);


        curl_close($curl);


        //---------------------------------------Infos à récuperer de l'appel---------------------------------------

        //info de airline

        $nameAirlineFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['airline']['name'];
        $logoFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['airline']['logo'];


        //info airport

        $nameFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['airport']['name'];
        $cityFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['airport']['city'];
        $countryFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['airport']['country'];

        //temps de vol

        $flightDateFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['datetime']['date_display'];
        $flightTimeFlight1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['datetime']['time_24h'];
        //prix

        $flightPrice1 = $formatTabFlight1['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['price_details']['baseline_total_fare'];



        //tableau des éléments récupéré
        $tabFlight1Infos = array(
            "nameAirline1" => $nameAirlineFlight1,
            "logo1" => $logoFlight1,
            "nameFlight1" => $nameFlight1,
            "cityFlight1" => $cityFlight1,
            "countryFlight1" => $countryFlight1,
            "flightDateFlight1" => $flightDateFlight1,
            "flightTimeFlight1" => $flightTimeFlight1,
            "flightPrice1" => $flightPrice1
        );

        // echo "<pre>";

        // print_r($tabFlight1Infos);
        // echo "</pre>";
        // die();






        //------------------------------------------------------Appel API pour hotels------------------------------------------------------


        //Appel API pour avoir l'iD de l'hotel a la destination donné
        $originCityName = substr($originCity, 4, 11);
        $destinationCityName = substr($destinationCity, 4, 11);

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
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v1/hotels/locations?name=" . $destinationCityName . "&search_type=ALL",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $_SESSION['apikey']
            ],


        ]);

        //Exécutez la requête 
        $resultHotelsLocation = curl_exec($curl);
        $errHotelLocation = curl_error($curl);

        $formatTabForIdHotels = json_decode($resultHotelsLocation, true);

        curl_close($curl);

        $idHotel = $formatTabForIdHotels[0]['id'];

        // echo "<pre>";

        // print_r($idHotel ) ; 

        // echo "</pre>";
        // die();



        //Appel API pour avoir les détails de l'hotel a la destination donné

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v1/hotels/search?sort_order=HDR&location_id=" . $idHotel . "&date_checkout=" . $returnDate . "&date_checkin=" . $departureDate . "&star_rating_ids=3.0%2C3.5%2C4.0%2C4.5%2C5.0",
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
                $_SESSION['apikey']
            ],
        ]);

        $resultHotelDetail = curl_exec($curl);
        $errHotel = curl_error($curl);

        curl_close($curl);

        $formatTabForHotelsDetail = json_decode($resultHotelDetail, true);

        $nameHotel =  $formatTabForHotelsDetail["hotels"][0]["name"];
        $brandHotel =  $formatTabForHotelsDetail["hotels"][0]["brand"];
        $starRatingHotel =  $formatTabForHotelsDetail["hotels"][0]["starRating"];
        $featuresHotel =  $formatTabForHotelsDetail["hotels"][0]["hotelFeatures"]["hotelAmenityCodes"];

        $tabHotelInfos = array(
            'nameHotel' => $nameHotel,
            'brandHotel' => $brandHotel,
            'starRatingHotel' => $starRatingHotel,
            'featuresHotel' => $featuresHotel

        );



        // echo "<pre>";

        // print_r($tabHotelInfos);

        // echo "</pre>";

        // die();





        //------------------------------------------------------Appel API pour avions retour------------------------------------------------------
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
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $returnDate . "&adults=" . $adults . "&origin_airport_code=" . $destinationCityCode . "&destination_airport_code=" . $originCityCode,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $_SESSION['apikey']
            ],
        ]);


        $resultFlights2 = curl_exec($curl);
        $errFlight2 = curl_error($curl);

        $formatTabFlight2 = json_decode($resultFlights2, true);

        curl_close($curl);



        //---------------------------------------Infos à récuperer de l'appel---------------------------------------

        //info de airline

        $nameAirlineFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['airline']['name'];
        $logoFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['airline']['logo'];

        //info airport

        $nameFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['airport']['name'];
        $cityFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['airport']['city'];
        $countryFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['airport']['country'];

        //temps de vol

        $flightDateFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['datetime']['date_display'];
        $flightTimeFlight2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['slice_data']['slice_0']['departure']['datetime']['time_24h'];

        //prix

        $flightPrice2 = $formatTabFlight2['getAirFlightDepartures']['results']['result']['itinerary_data']['itinerary_0']['price_details']['baseline_total_fare'];



        //tableau des éléments récupéré
        $tabFlight2Infos = array(
            "nameAirline2" => $nameAirlineFlight2,
            "logo2" => $logoFlight2,
            "nameFlight2" => $nameFlight2,
            "cityFlight2" => $cityFlight2,
            "countryFlight2" => $countryFlight2,
            "flightDateFlight2" => $flightDateFlight2,
            "flightTimeFlight2" => $flightTimeFlight2,
            "flightPrice2" => $flightPrice2
        );


        // echo "<pre>";

        // print_r($tabFlight2Infos);
        // echo "</pre>";
        // die();





        if ($errFlight1 || $errHotel || $errFlight2) {
            echo "cURL Error #:" . $errFlight1 . $errHotelLocation . $errFlight2;
        } else {

            //print_r($format);
            //die();
            return $tabFlight1Infos + $tabHotelInfos  + $tabFlight2Infos;
        }
    }
}
