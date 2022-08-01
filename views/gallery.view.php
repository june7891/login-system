<?php ob_start();?>


<div class="profil">
    <h1>Ta gallerie </br>
        de souvenirs</h1>
    <div class="profil-photo">
        <div class="photouser"></div>
        <div class="pseudouser"><?php if(isset($_SESSION['username'])) {
                echo explode(" ", $_SESSION['username'])[0];} ?></div>
    </div>
</div>
<div class="partage">
    <h1>Partage tes photos !</h1>
    <p><button type="submit"><a href="<?= URL ?>gallery/add">Envoyer</a></button></p>
</div>


<section class="section1" id="section1">

    <div class="container">

    <?php foreach($tabImages as $image) : ?>
    
     
        <div class="col">
            <div class="card">
                <div class="photosouvenir">

                  <img src="../public/images/<?php echo $image['image_name']?>" style="width:100%; height:100%">
        
                </div>
                  

                <div class="lieusouvenir"><?php echo $image['image_title']?></div>

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