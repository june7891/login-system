<?php ob_start();?>

<div class="d-flex justify-content-center mt-5">
    <form method="POST" action="<?= URL ?>back/catalogue/addValidation" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="exampleInputEmail1">Prekės pavadinimas</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Aprašymas</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="price">Kaina</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>


        <div class="form-group my-5">
            <input type='file' class="form-control-file" name='image' multiple />
            <button type="submit" class="btn btn-secondary" name="submit">Ikelti</button>

        </div>

        <div class='row no-gutters'>
            <div class="col-1"></div>
            <?php foreach($categories as $category) : ?>
            <div class="form-group form-check col-2">
                <input type="checkbox" class="form-check-input" name="category-<?= $category['id'] ?>">
                <label class="form-check-label" for="exampleCheck1"><?= $category['name'] ?></label>
            </div>
            <?php endforeach; ?>
            <div class="col-1"></div>
        </div>
        <button type="submit" class="btn btn-primary">ikelti</button>

    </form>

</div>

<?php
$content = ob_get_clean();
$titre = "Ikelti prekes";
require "views/commons/template.php";