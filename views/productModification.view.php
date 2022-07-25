<?php ob_start(); ?>
<div class="d-flex justify-content-center mt-5">

    <form method="POST" action="<?= URL ?>back/catalogue/modificationValidation" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id']; ?>" />
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $lignesProduct[0]['title'] ?>">
        </div>
        <div class="form-group">
            <label for="description">Aprasymas</label>
            <input type="text" class="form-control" id="description" name="description"
                value="<?= $lignesProduct[0]['description'] ?>">
        </div>
        <div class="form-group">
            <label for="price">Kaina</label>
            <input type="text" class="form-control" id="price" name="price"
                value="<?= $lignesProduct[0]['price'] ?>"></input>
        </div>

        <div class="form-group">
            <img src="<?= URL ?>public/images/<?= $lignesProduct[0]['image_name'] ?>" style="width:50px;" />
            <label for="image">Nuotrauka :</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class='row no-gutters'>
            <label for="category">Kategorija :</label>
            <div class="col-1"></div>
            <?php foreach($categories as $category) : ?>
            <div class="form-group form-check col-2">
                <input type="checkbox" class="form-check-input" name="category-"
                    <?php if (in_array($category['id'], $tabCategory)) echo "checked"?>>
                <label class="form-check-label" for="exampleCheck1"><?= $category['id'] ?></label>
            </div>
            <?php endforeach; ?>
            <div class="col-1"></div>
        </div>
        <button type="submit" class="btn btn-primary">Keisti</button>
    </form>
</div>
< <?php 
$content = ob_get_clean();
$titre = "Page de modification du produit : ". $lignesProduct[0]['title'];
require "views/commons/template.php";