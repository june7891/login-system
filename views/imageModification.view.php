<?php ob_start(); ?>

<div class="form">

    <form method="POST" action="<?= URL ?>gallery/modificationValidation" enctype="multipart/form-data">
        <input type="hidden" name="image_id" value="<?= $image['image_id']; ?>" />
        <div class="form-group">
            <label for="title">Lieu</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $image['image_title'] ?>">
        </div>
        

        <div class="form-group">
            <img src="<?= URL ?>public/images/<?= $image['image_name'] ?>" style="width:50px;" />
            <label for="image">Photo :</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

    
        <button type="submit">Modifier</button>
    </form>
</div>


<?php 
$content = ob_get_clean();
$titre = "Page de modification de l'image : ". $image['image_id'];
require "./views/commons/template.php";
