<?php ob_start();

require_once "views/commons/searchForm.php";
require_once "views/commons/slider.php";



$content = ob_get_clean();
$titre = "Page d'accueil";
require "views/commons/template.php";