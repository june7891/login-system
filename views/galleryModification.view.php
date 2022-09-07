<?php ob_start();?>


    <a href="<?= URL ?>gallery/show"><button class="btn-form" type="submit">Revenir</button></a>




<section class="section1" id="section1">

    <div class="container-gallery">

    <?php if(!empty($tabImages)) {

    foreach($tabImages as $image) : ?>
    
     
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
        <?php } else {?>
            <h2>Tu n'as rien à modifier!</h2> 
            <a href="<?= URL ?>gallery/add"><button class="btn">Ajouter</button></a>
        <?php } ?>

    </div>
</section>


<?php
$content = ob_get_clean();
$titre = "Gallery";
require "views/commons/template.php";