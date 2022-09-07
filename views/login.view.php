<?php ob_start();?>






    <div class="form">
    <form  method="post" action="<?= URL ?>connection">
    <?php flash('login')?>
        <input type="text" name="username/email"  
        placeholder="pseudo/email">
        <input type="password" name="password"
        placeholder="mot de passe">
        <p class="cross" ><input class="check"type="checkbox" name="check" id="">se souvenir de moi</p>
        <button class="btn" type="submit" name="submit">Se connecter</button>

        <div class="inscription">
        <p class="password"><a href="<?= URL ?>remindPassword">mot de passe oublié</a></p>
        <p >pas de compte ?<a href="<?= URL ?>signup">s'inscrire</a></p>
        </div>
    </form> 
    </div>


<?php
$content = ob_get_clean();
$titre = "Bon retour, Triper !";
require "views/commons/template.php";