<?php ob_start();?>





<div class="form">

    <form method="post" action="<?= URL ?>inscription">
    <?php flash('register') ?>
        <input type="hidden" name="type" value="register">
        <input type="text" name="username" placeholder="pseudo">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="mot de passe">
        <input type="password" name="confirm_password" placeholder="confirme ton mot de passe">
        <p class="cross"><input class="check" type="checkbox" name="check" id="">recevoir la newsletter</p>
        <button type="submit" name="submit">s'inscrire</button>
        <p class="connection">déjà un compte ? <a href="<?= URL ?>login">Se connecter</a></p>
    </form>
</div>



<?php
$content = ob_get_clean();
$titre = "Deviens un triper !";
require "views/commons/template.php";