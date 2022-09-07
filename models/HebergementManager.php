<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class HebergementManager{

    public function getHebergementsByLocation($departureDate, $returnDate, $adults, $children, $destinationCity){
       //Appel API pour avoir l'iD de l'hotel a la destination donné
       $destinationCityName = substr($destinationCity, 4, 11);

    //    print_r($departureDate . '/');
    //    print_r($returnDate . '/');
    //    print_r($adults . '/');
    //    print_r($children . '/');
    //    print_r($destinationCity . '/');
    //    die();


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

       $nameHotel =  $formatTabForHotelsDetail["hotels"][1]["name"];
       $brandHotel =  $formatTabForHotelsDetail["hotels"][1]["brand"];
       $starRatingHotel =  $formatTabForHotelsDetail["hotels"][1]["starRating"];
       $featuresHotel =  $formatTabForHotelsDetail["hotels"][1]["hotelFeatures"]["hotelAmenityCodes"];
       $CityNameHotel =  $formatTabForHotelsDetail["cityInfo"]["cityName"];
       $CountryNameHotel =  $formatTabForHotelsDetail["cityInfo"]["countryName"];
       $imageHotel =  $formatTabForHotelsDetail["hotels"][1]["media"];
       $priceHotel = $formatTabForHotelsDetail["hotels"][1]["ratesSummary"]['minStrikePrice'];

       $tabHotelInfos = array(
           'nameHotel' => $nameHotel,
           'brandHotel' => $brandHotel,
           'starRatingHotel' => $starRatingHotel,
           'featuresHotel' => $featuresHotel,
           'CityNameHotel' => $CityNameHotel,
           'CountryNameHotel' => $CountryNameHotel,
           'imageHotel ' => $imageHotel,
           'priceHotel' => $priceHotel        
       );
    curl_close($curl);
    
    if ($errHotel) {
        echo "cURL Error #:" . $errHotel;
    } else {
        
        //print_r($format);
        //die();
        return $tabHotelInfos;
        
    }
    }
}