<?php ob_start();?>


<div>
  <h3>Un mail vient de vous être envoyé au <?php echo $email ?>.</h3>  
</div>



<?php
$content = ob_get_clean();
$titre = "Mot de passe oublié";
require "views/commons/template.php";