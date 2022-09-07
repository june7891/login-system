<div class="subtext">
    <a id="sejours" class="typeTravel" href="#">Séjours</a>
    <a id="hebergement" class="typeTravel2 travelTract" href="#">Hébergement </a>
    <a id="transport" class="typeTravel2" href="#">Transport</a>
</div>
<div class="form-search container-search">
    <form id='formTrip' class="" action="<?= URL ?>resultTrip" method="post">
        <div class="search">
            <select id="depart" type="text" name="originCityTrip">
                <option value="">--Ville de départ--</option>
                <option value="CDG Paris      23631">Paris</option>
                <option value="BRU Bruxelle   23711">Bruxelle</option>
                <option value="VNO Vilnius    33401">Vilnius</option>
                <option value="TLS Toulouse   23761">Toulouse</option>
                <option value="TLN Toulon     4908">Toulon</option>
            </select>
            <!-- <input id="dateRetour" type="date" name="departureDateTrip" placeholder="Date de départ" value="departureDateTrip"> -->
            <input required="" name = "departureDateTrip" placeholder="Date de départ"  type="text" class="form-control" onfocus="(this.type='date')"/>

            <!-- <input id="dateRetour" type="date" name="returnDateTrip" placeholder="returnDate" value="returnDateTrip"> -->
            <input required="" name = "returnDateTrip" placeholder="Date de retour"  type="text" class="form-control" onfocus="(this.type='date')"/>
        </div>
        <div class="box">
            <div class="date">
                <select name="destinationCityTrip" id="destination" type="text" placeholder="DestinationTrip">
                    <option value="">--Ville d'arrivée--</option>
                    <option value="CDG Paris      23631">Paris</option>
                    <option value="BRU Bruxelle   23711">Bruxelle</option>
                    <option value="VNO Vilnius    33401">Vilnius</option>
                    <option value="TLS Toulouse   23761">Toulouse</option>
                    <option value="TLN Toulon     4908">Toulon</option>
                </select>

                <input id="voyageur" type="number" name="adultsTrip" id="" min="1" placeholder="adults" value="adultsTrip">
                <!-- <input id="voyageur" type="number" name="voyageurs" id="" min="1" placeholder="children" value="children"> -->

            </div>
            <div class="btn-valider-accueil">
                <button class="btn-form " type="submit" value="Rechercher">
                    Valider
                </button>
            </div>
            <div>
                <img id="filter" src="images/filter.svg" alt="">
            </div>
        </div>
    </form>

    <form id='formTransport' class="" action="<?= URL ?>resultTransport" method="post">
        <div class="search">
            <select id="depart" type="text" name="originCityTransport">
                <option value="">--Ville de départ--</option>
                <option value="CDG Paris      23631">Paris</option>
                <option value="BRU Bruxelle   23711">Bruxelle</option>
                <option value="VNO Vilnius    33401">Vilnius</option>
                <option value="TLS Toulouse   23761">Toulouse</option>
                <option value="TLN Toulon     4908">Toulon</option>
            </select>
            <!-- <input id="dateRetour" type="date" name="departureDateTransport" placeholder="Date de départ" value="departureDateTransport"> -->
            <input required="" name = "departureDateTransport" placeholder="Date de départ"  type="text" class="form-control" onfocus="(this.type='date')"/>

            <!-- <input id="dateRetour" type="date" name="returnDateTransport" placeholder="returnDate" value="returnDateTransport"> -->
            <input required="" name = "returnDateTransport" placeholder="Date de retour"  type="text" class="form-control" onfocus="(this.type='date')"/>
        </div>
        <div class="box">
            <div class="date">
                <select name="destinationCityTransport" id="destination" type="text" placeholder="Destination">
                    <option value="">--Ville d'arrivée--</option>
                    <option value="CDG Paris      23631">Paris</option>
                    <option value="BRU Bruxelle   23711">Bruxelle</option>
                    <option value="VNO Vilnius    33401">Vilnius</option>
                    <option value="TLS Toulouse   23761">Toulouse</option>
                    <option value="TLN Toulon     4908">Toulon</option>
                </select>

                <input id="voyageur" type="number" name="adultsTransport" id="" min="1" placeholder="adults" value="adultsTransport">
                <!-- <input id="voyageur" type="number" name="voyageurs" id="" min="1" placeholder="children" value="children"> -->

            </div>
            <div class="">
                <button class="btn-form" type="submit" value="Rechercher">
                    Valider
                </button>
            </div>
            <div>
                <img id="filter" src="images/filter.svg" alt="">
            </div>
        </div>
    </form>

    <form id='formHebergement' class="" action="<?= URL ?>resultHebergement" method="post">
        <div class="search">
<!--             
            <input id="dateRetour" type="date" name="departureDateHebergement" placeholder="Date de départ" value="departureDateHebergement"> -->
            <input required="" name = "departureDateHebergement" placeholder="Date de départ"  type="text" class="form-control" onfocus="(this.type='date')"/>

            <!-- <input id="dateRetour" type="date" name="returnDateHebergement" placeholder="returnDate" value="returnDateHebergement"> -->
            <input required="" name = "returnDateHebergement" placeholder="Date de retour"  type="text" class="form-control" onfocus="(this.type='date')"/>
        </div>
        <div class="box">
            <div class="date">
                <select name="destinationCityHebergement" id="destination" type="text" placeholder="Destination">
                    <option value="">--Ville d'arrivée--</option>
                    <option value="CDG Paris      23631">Paris</option>
                    <option value="BRU Bruxelle   23711">Bruxelle</option>
                    <option value="VNO Vilnius    33401">Vilnius</option>
                    <option value="TLS Toulouse   23761">Toulouse</option>
                    <option value="TLN Toulon     4908">Toulon</option>
                </select>

                <input id="voyageur" type="number" name="adultsHebergement" id="" min="1" placeholder="adults" value="adultsHebergement">
                <!-- <input id="voyageur" type="number" name="voyageurs" id="" min="1" placeholder="children" value="children"> -->

            </div>
            <div class="">
                <button class="btn-form" type="submit" value="Rechercher">
                    Valider
                </button>
            </div>
            <div>
                <img id="filter" src="images/filter.svg" alt="">
            </div>
        </div>
    </form>

    <div id="filtre" class="modalFiltre">
        <div>
            <h2>Budget</h2>
            <a href="#" class="close"> X</a>
            <div class="budget">
                <label for="budget">prix mini</label>
                <input type="text" name="budget" value="0">
                <label for="budget">prix maxi</label>
                <input type="text" name="budget" value="0">
            </div>
        </div>
        <div>
            <h2>Expérience</h2>
            <div class="experience">
                <div>
                    <input type="checkbox" name="experience" id="famille" value="famille">
                    <label for="experience"> famille</label>
                </div>
                <div>
                    <input type="checkbox" name="experience" id="enAmoureux" value="enAmoureux">
                    <label for="en amoureux"> en amoureux</label>
                </div>
                <div>

                    <input type="checkbox" name="experience" id="entreAmis" value="entreAmis">
                    <label for="entre amis">entre amis</label>
                </div>
                <div>
                    <input type="checkbox" name="experience" id="bienEtre" value="bienEtre">
                    <label for="bien etre">bien-être</label>

                </div>
                <div>

                    <input type="checkbox" name="experience" id="nature" value="nature">
                    <label for="nature">nature</label>
                </div>
                <div>
                    <input type="checkbox" name="experience" id="insolite" value="insolite">
                    <label for="insolite">insolite</label>

                </div>
                <div>
                    <input type="checkbox" name="experience" id="sport" value="sport">
                    <label for="sport">sport</label>

                </div>
                <div>

                    <input type="checkbox" name="experience" id="culture" value="culture">
                    <label for="culture">culture</label>
                </div>



            </div>

        </div>


        <div>
            <h2>Type de destination</h2>
            <div class="destination">
                <div>
                    <input type="checkbox" name="destination" id="plage" value="plage">
                    <label for="plage">plage</label>
                </div>
                <div>
                    <input type="checkbox" name="destination" id="ville" value="ville">
                    <label for="ville">ville</label>
                </div>
                <div>

                    <input type="checkbox" name="destination" id="mer" value="mer">
                    <label for="mer">mer</label>
                </div>
                <div>
                    <input type="checkbox" name="destination" id="campagne" value="campagne">
                    <label for="campagne">campagne</label>
                </div>
                <div>
                    <input type="checkbox" name="destination" id="montagne" value="montagne">
                    <label for="montagne">montagne</label>
                </div>
            </div>
        </div>

        <div>
            <h2>Escale</h2>
            <div class="escales">
                <div>
                    <input type="radio" name="escales" id="escales" value="escales">
                    <label for="escales">oui</label>
                </div>
                <div>
                    <input type="radio" name="escales" id="escales" value="escales">
                    <label for="escales">non</label>
                </div>
            </div>
        </div>

        <div id="filtreHebergement">

            <h2>Hébergement</h2>
            <div class="hebergement">
                <div>
                    <input type="checkbox" name="hebergement" id="hotel" value="hotel">
                    <label for="hotel">hotel</label>
                </div>
                <div>
                    <input type="checkbox" name="hebergement" id="gite" value="gite">
                    <label for="gite">gite</label>
                </div>
                <div>
                    <input type="checkbox" name="hebergement" id="camping" value="camping">
                    <label for="camping">camping</label>
                </div>
                <div>
                    <input type="checkbox" name="hebergement" id="chambreDHotes" value="chambreDHotes">
                    <label for="chambreDHotes">chambres d'hôtes</label>
                </div>
            </div>
        </div>
        <div id="filtreTransport">
            <h2>Type de transport</h2>
            <div class="transport">
                <div>
                    <input type="checkbox" name="transport" id="avion" value="avion">
                    <label for="avion">avion</label>
                </div>
                <div>
                    <input type="checkbox" name="transport" id="covoiturage" value="covoiturage">
                    <label for="covoiturage">covoiturage</label>
                </div>
                <div>
                    <input type="checkbox" name="transport" id="bus" value="bus">
                    <label for="bus">bus</label>
                </div>
                <div>
                    <input type="checkbox" name="transport" id="voiture" value="voiture">
                    <label for="voiture">voiture</label>
                </div>
                <div>
                    <input type="checkbox" name="transport" id="transport" value="bateau">
                    <label for="bateau">bateau</label>
                </div>
            </div>
        </div>

    </div>

</div>