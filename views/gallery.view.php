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
    <p><button type="submit"><a href="upload-images.php">Envoyer</a></button></p>
</div>


<section class="section1" id="section1">

    <div class="container">


        <div class="col">
            <div class="card">
                <div class="photosouvenir">
                    <img src="https://picsum.photos/200/300" alt="" style="width:100%; height:100%">
                </div>
                <div class="lieusouvenir">ville</div>
                <a href="modifier-gallery.php?id=<?=$image['id']; ?>"> <img src="./images/modify.svg" alt=""></a>
                <a href="delete-image.php?id=<?=$image['id']; ?>"> <img src="./images/croix.svg" alt=""></a>
            </div>
        </div>


    </div>
</section>


<?php
$content = ob_get_clean();
$titre = "Gallery";
require "views/commons/template.php";