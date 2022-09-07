<?php ob_start(); ?>



 
<h1>Contactez nous</h1>
    <div class="form ">
        <form class="contact"action="" method="post">
            <input type="text" name="email" id="" placeholder="ton adresse mail">
            <input type="text" name="mail" id="" placeholder="ton nom">
            <input type="text" name="subject" id="" placeholder="sujet">
            <textarea name="message" id="" cols="30" rows="10" placeholder="message"></textarea>
            <button class="btn" type="submit"> Envoyer</button></p>
        </form>
    </div>



<?php
$content = ob_get_clean();
$titre = "Page d'accueil";
require "views/commons/template.php"; ?>