<?php ob_start(); ?>
<div class="d-flex justify-content-center mt-5">

    <form method="POST" action="<?= URL ?>back/catalogue/modificationValidation" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id']; ?>" />
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $lignesProduct[0]['title'] ?>">
        </div>
        <

        <div class="form-group">
            <img src="<?= URL ?>public/images/<?= $lignesProduct[0]['image_name'] ?>" style="width:50px;" />
            <label for="image">Nuotrauka :</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

    
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
< <?php 
$content = ob_get_clean();
$titre = "Page de modification du produit : ". $lignesProduct[0]['title'];
require "views/commons/template.php";