<?php ob_start();?>

<h1>T’as un trou de mémoire?</h1>

<div class="form">
    

<form method="post" action="<?= URL ?>remindPasswordValidation">
<input type="hidden" name="type" value="remind">
<p>Tu recevras un nouveau mot de passe temporaire par mail</p>
<?php flash('remind') ?>

    <input type="email" name="email"  
    placeholder="ton adresse e-mail">
    <button class="btn" type="submit" name="submit">Envoyer</button>
</form>

</div>





<?php
$content = ob_get_clean();
$titre = "Mot de passe oublié";
require "views/commons/template.php";