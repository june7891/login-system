<?php ob_start();
require_once "./controllers/TripControllers.php"
?>


<div class="subtext">
    <a id="sejours" class="typeTravel" href="#">Séjours</a>
    <a id="hebergement" class="typeTravel2 travelTract" href="#">Hébergement </a>
    <a id="transport" class="typeTravel2" href="#">Transport</a>
</div>
<div class="form container formtrip">
    <form id='formUrl' class="" action="<?= URL ?>resultTrip" method="post">
        <div class="search-trip">

            <div class="searchtripeur">
                <p>Départ</p>
                <input readonly="readonly">
            </div>

            <div class="searchtripeur">
                <p>Destination</p>
                <input readonly="readonly2">
            </div>
            <div class="searchtripeur">
                <p>Date de départ</p>
                <input readonly="readonly3">
            </div>
            <div class="searchtripeur">
                <p>Date de retour</p>
                <input readonly="readonly4">
            </div>
            <div class="searchtripeur">
                <p>Nb voyageurs</p>
                <input readonly="readonly5">
            </div>
        </div>
        <div class="searchCard">
            <?= $variableGloblaleVoyage ?>


        </div>

</div>
</div>
</form>

<?php
$content = ob_get_clean();
$titre = "Les trips dispo : ";
require "views/commons/template.php";
