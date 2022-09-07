//Ouverture et fermeture filtres
var modal = document.getElementById("filtre");

var img = document.querySelector("#filter");

img.onclick = () => {
  modal.style.display = "block";
};

var closeButton = document.querySelector(".close");

closeButton.onclick = () => {
  modal.style.display = "none";
};

//Changement d'onglet

var hebergement = document.getElementById("hebergement");
var transport = document.getElementById("transport");
var sejour = document.getElementById("sejours");

var formHebergement = document.getElementById("formHebergement");
var formTransport = document.getElementById("formTransport");
var formTrip = document.getElementById("formTrip");

var filtreHebergement = document.getElementById("filtreHebergement");
var filtreTransport = document.getElementById("filtreTransport");

//Hébergement

hebergement.onclick = () => {
  formHebergement.style.display = "block";
  formTransport.style.display = "none";
  formTrip.style.display = "none";

  transport.style.backgroundColor = "#69DC8A";
  hebergement.style.backgroundColor = "#F9B532";
  sejour.style.backgroundColor = "#69DC8A";

  filtreTransport.style.display = "none";
  filtreHebergement.style.display = "";
};

//Transport

transport.onclick = () => {
  formTransport.style.display = "block";
  formHebergement.style.display = "none";
  formTrip.style.display = "none";

  transport.style.backgroundColor = "#F9B532";
  hebergement.style.backgroundColor = "#69DC8A";
  sejour.style.backgroundColor = "#69DC8A";

  filtreTransport.style.display = "";
  filtreHebergement.style.display = "none";
  //à changer
  formUrl.action =
    "http://localhost/ecolotrip-git/login-system/resultTransport";
  // formUrl.action = "<?= URL ?>resultTrip";
};

//Séjours

sejour.onclick = () => {
  formTrip.style.display = "block";
  formHebergement.style.display = "none";
  formTransport.style.display = "none";

  transport.style.backgroundColor = "#69DC8A";
  hebergement.style.backgroundColor = "#69DC8A";
  sejour.style.backgroundColor = "#F9B532";

  filtreTransport.style.display = "";
  filtreHebergement.style.display = "";

  //à changer
  formUrl.action = "http://localhost/ecolotrip-git/login-system/resultTrip";
};
