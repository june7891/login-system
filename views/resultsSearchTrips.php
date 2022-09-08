<?php ob_start();
$departureDate = $result[1];
$datedepartmodif = strftime('%d-%m-%Y', strtotime($departureDate));
$dateretourmodif = strftime('%d-%m-%Y', strtotime($returnDate));
$nbvoyageur = intval($adults) + intval($children);

$vartest = substr($originCity, 0, 3);
$vartest2 = substr($destinationCity, 0, 3);


switch ($vartest) {
    case 'CDG':
        $originCity = "Paris";
        break;
    case 'BRU':
        $originCity = "Bruxelles";
        break;
    case 'VNO':
        $originCity = "Vilnius";
        break;
    case 'TLS':
        $originCity = "Toulouse";
        break;
    case 'TLN':
        $originCity = "Toulon";
        break;
    default:
        $originCity = "Inconnu";
        break;
}



switch ($vartest2) {
    case 'CDG':
        $destinationCity = "Paris";
        break;
    case 'BRU':
        $destinationCity = "Bruxelles";
        break;
    case 'VNO':
        $destinationCity = "Vilnius";
        break;
    case 'TLS':
        $destinationCity = "Toulouse";
        break;
    case 'TLN':
        $destinationCity = "Toulon";
        break;
    default:
        $destinationCity = "Inconnu";
        break;
}

// CDG Paris      23631
//                     "BRU Bruxelle   23711
//                     VNO Vilnius    33401
//                     TLS Toulouse   23761
//                     TLN Toulon     4908option>



?>


<div class="subtext">
    <a id="sejours" class="typeTravel" href="#">Séjours</a>
    <a id="hebergement" class="typeTravel2 travelTract" href="#">Hébergement </a>
    <a id="transport" class="typeTravel2" href="#">Transport</a>
</div>
<div class="form container formtrip">
    <form id='formUrl' class="" action="<?= URL ?>resultSearchTrip" method="post">
        <div class="search-trip">

            <div class="searchtripeur">
                <p>Départ</p>
                <input style="font-size: 20px;" value=<?= $originCity ?> readonly="readonly1">
            </div>

            <div class="searchtripeur">
                <p>Destination</p>
                <input style="font-size: 20px;" value=<?= $destinationCity ?> readonly="readonly2">
            </div>
            <div class="searchtripeur">
                <p>Date de départ</p>
                <input style="font-size: 20px;" value=<?= $datedepartmodif ?> readonly="readonly3">
            </div>
            <div class="searchtripeur">
                <p>Date de retour</p>
                <input style="font-size: 20px;" value=<?= $dateretourmodif ?> readonly="readonly4">
            </div>
            <div class="searchtripeur">
                <p>Nb voyageurs</p>
                <input style="font-size: 20px;" value=<?= $nbvoyageur ?> readonly="readonly53">
            </div>
        </div>
        <div class="searchCard">

    </form>

</div>

</div>


</div>
</form>

<?php
$content = ob_get_clean();
$titre = "Les trips dispo : ";
require "views/commons/template.php";
