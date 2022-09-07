<?php ob_start();

// require_once "views/commons/searchForm.php";
// require_once "./css/searchForm.style.css";
require_once('views/commons/searchForm.php');
require_once "views/commons/slider.php";
require_once "views/commons/cards.php";
require_once "views/commons/newsletter.php";
require_once "views/commons/advantages.php";

?>

<script src="utils/js/form.js"></script>


<?php
$content = ob_get_clean();
$titre = "Page d'accueil";
require "views/commons/template.php"; ?>