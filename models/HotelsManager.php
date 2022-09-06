<?php

class HotelsManager{

    public function getHotelsByLocation($location, $departure, $returnDate){
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
        CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v1/hotels/locations?name=".$location."&search_type=ALL",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
            "X-RapidAPI-Key: 035f357087msh1f21ca6ebbb69c0p150c74jsn3bca8b4ec6b8"
        ],


    ]);

    //Exécutez la requête 
    $result = curl_exec($curl);
    $err = curl_error($curl);

    $format = json_decode($result, true);

    //Afficher le résultat
    //$itemName = $format[0];
    
    //print_r($profiles[0]['name']);
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        
        //print_r($format);
        //die();
        return $format;
        
    }
    }
}