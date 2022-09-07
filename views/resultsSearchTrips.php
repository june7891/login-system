<?php ob_start(); ?>

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
                <input readonly id="dateRetour" type="date" name="departureDate" placeholder="Date de départ" value="departureDate">
            </div>
            <div class="searchtripeur">
                <p>Date de retour</p>
                <input readonly id="dateRetour" type="date" name="returnDate" placeholder="returnDate" value="returnDate">
            </div>

        </div>
        <div class="box">

            <div class="date">
                <div>
                    <p>Nombre de voyageurs</p>
                    <input class = "inputReadOnly" readonly id="voyageur" type="number" name="adults" id="" min="1" placeholder="adults" value="adults">
                    <!-- <input id="voyageur" type="number" name="voyageurs" id="" min="1" placeholder="children" value="children"> -->
                </div>
            </div>

            <div>
                <img id="filter" src="./images/filtre.svg" alt="">
            </div>
        </div>
    </form>

    <?php
    $content = ob_get_clean();
    $titre = "Les trips dispo : ";
    require "views/commons/template.php";
