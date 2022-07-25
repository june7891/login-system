<?php ob_start();?>


<h1>Bienvenue, <?php $_SESSION['username']?></h1>

<?php
$content = ob_get_clean();
$titre = "Page accueil utilisateur";
require "views/commons/template.php";