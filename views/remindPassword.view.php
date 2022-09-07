<?php ob_start();?>



<div class="form">
    

<form method="post" action="<?= URL ?>remindPasswordValidation">
<input type="hidden" name="type" value="remind">
<?php flash('remind') ?>

    <input type="email" name="email"  
    placeholder="email">
    <button class="btn" type="submit" name="submit">Envoyer</button>
</form>

</div>





<?php
$content = ob_get_clean();
$titre = "Mot de passe oublié";
require "views/commons/template.php";