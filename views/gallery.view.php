<?php ob_start(); ?>


<div class="profil">
    <h1>Ta gallerie </br>
        de souvenirs</h1>
    <div class="profil-photo">
        <div class="username"><img src="<?php if (!empty($user['profilePhoto'])) { ?>
            <?= URL ?>public/images/<?php echo $user['profilePhoto'];
                                        } else { ?>https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png

        <?php } ?>" alt="" style="width:100%; height:100%; border-radius: 15px"></div>
        <div class="username"><?php if (isset($_SESSION['username'])) {
                                    echo explode(" ", $_SESSION['username'])[0];
                                } ?></div>
    </div>
</div>
<div class="share">
    <h1>Partage tes photos !</h1>
   <a href="<?= URL ?>gallery/add"><button class="btn">Envoyer</button></a>
    <a href="<?= URL ?>gallery/modify"><button class="btn">Modifier</button></a>
</div>


<section class="section1" id="section1">

    <div class="container">

        <?php foreach ($tabImages as $image) : ?>


            <div class="col">
                <div class="card">
                    <div class="photo-container">

                        <img src="<?= URL ?>public/images/<?php echo $image['image_name'] ?>" style="">

                    </div>


                    <div class="image-title"><?php echo $image['image_title'] ?></div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>


<!-- Modal image -->



<?php
$content = ob_get_clean();
$titre = "Gallery";
require "views/commons/template.php";
