<?php ob_start();?>


<h2>Le compte à été bien supprimé :( </h2>
<a href="<?= URL ?>accueil"><button class="btn-form" type="submit">Revenir</button></a>


<?php
$content = ob_get_clean();

require "views/commons/template.php";