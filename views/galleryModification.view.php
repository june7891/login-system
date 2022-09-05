<?php ob_start();?>


    <button type="submit"><a href="<?= URL ?>gallery/show">Revenir à la gallerie</a></button>




<section class="section1" id="section1">

    <div class="container">

    <?php foreach($tabImages as $image) : ?>
    
     
        <div class="col">
            <div class="card">
                <div class="photo-container">

                  <img src="../public/images/<?php echo $image['image_name']?>">
        
                </div>
                  

                <div class="image-title"><?php echo $image['image_title']?></div>

                <div class="buttons">
                     <form method="post" action="<?= URL ?>gallery/validationSuppression"
                onSubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                <input type="hidden" name="image_id" value="<?= $image['image_id'] ?>" />
                <input type="submit" value="" class="btn-delete">
                    </form>

                <form method="post" action="<?= URL ?>gallery/modification/<?=$image['image_id']?>">
                <input type="hidden" name="image_id" value="<?= $image['image_id'] ?>" />
                <input type="submit" value="" class="btn-modify">
                </form>


                </div>
               

               
           

      
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>


<?php
$content = ob_get_clean();
$titre = "Gallery";
require "views/commons/template.php";