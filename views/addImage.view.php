<?php ob_start();?>



<div class="form">

    <form method='post' action="<?= URL ?>gallery/addValidation" enctype='multipart/form-data'>
        <?php flash('upload') ?>
        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
        <input type="text" name="title" placeholder="titre">
        <input type='file' name='image' multiple />

        <button type="submit" name="submit"> Envoyer</button>

    </form>
</div>

<?php
$content = ob_get_clean();
$titre = "Ajouter les images";
require "views/commons/template.php";