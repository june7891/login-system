


<div class="tab-container">
    <div class="bloc-tabs">
        <button class="" onclick="openTab('sejours')" >
            Séjours
        </button>
        <button class="" onclick="openTab('hebergement')" >
            Hébergement
        </button>
        <button class="" onclick="openTab('transport')">
            Transport
        </button>
    </div>

    <div class="content-tabs">
        <div  id="sejour" class="tab">
            <div class="form">
                <form class="" action="" method="">
                    <div class="travelInfoFirstRow">
                        <input id="departure" type="text" name="search" placeholder="Départ" />
                        <input id="destination" type="text" name="search" placeholder="Destination" />
                    </div>

                    <div class="travelInfoSecondRow">
                        <input type="date" name="date" placeholder="Date de départ" />
                        <input type="date" name="date" placeholder="Date de retour" />
                        <input type="number" name="voyageurs" min="1" placeholder="voyageur" />
                        <img class="filter" src={filter} alt="" />
                    </div>

                    <button class="btn-form">Rechercher</button>


                </form>
            </div>
        </div>

        <div id="hebergement" class="tab" style="display:none">
            <div class="form">
                <form class="" action="" method="">
                    <div class="travelInfoFirstRow">
                        <input id="departure" type="text" name="search" placeholder='&#128719; Destination' />
                    </div>

                    <div class="form">
                        <input type="date" name="date" placeholder="Date de départ" />
                        <input type="date" name="date" placeholder="Date de retour" />
                        <input type="number" name="adultes" min="1" placeholder="adultes" />
                        <input type="number" name="adultes" min="1" placeholder="enfants" />
                        <input type="number" name="adultes" min="1" placeholder="chambres" />
                        <img class="filter" src={filter} alt="" />
                    </div>

                    <button class="btn-form">Rechercher</button>


                </form>
            </div>
        </div>

        <div id="transport" class="tab" style="display:none">
            <div class="form">
                <form class="" action="" method="">
                    <div class="travelInfoFirstRow">
                        <input id="departure" type="text" name="search" placeholder="Lieu de prise en charge :" />
                        <input type="checkbox" />
                        Je souhaite restituer la voiture à un autre endroit
                    </div>

                    <div class="travelInfoSecondRow">
                        <label htmlFor='datePriseEnCharge'>Date de prise en charge :</label>
                        <input id='datePriseEnCharge' type="date" name="date" />
                        <label htmlFor='dateRestitution'>Date de restitution :</label>
                        <input id='dateRestitution' type="date" name="date" />
                        <input type="checkbox" />
                        Le conducteur a-t-il entre 30 et 65 ans ?

                    </div>

                    <button class="btn-form">Rechercher</button>


                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openTab(tabName) {
  var i;
  var x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
</script>