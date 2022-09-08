<?php ob_start();?>


<h1>Ta carte de Triper perso</h1>

<div class="card-triper-container">

<div class="card-triper">
    <p><?php echo $user['username']?></p>
<p><?php $user['lastname']?></p>
<img src="../public/images/<?php echo $user['profilePhoto'] ?>" alt="photo profil">
<p><?php $user['occupation']?></p>


<h3>Photos</h3>
<img src="/images/camera.svg" alt="">
</div>



</div>

<div class="bottom-card-triper">
  
        <p>tu veux changer ta carte?</p>
    <a href="<?= URL ?>account/show"><button class="btn">Modifier</button></a>

    <p>tu veux récupérer ta carte?</p>
    <a href="/"><button class="btn">Télécharger</button></a>
  </div>






<?php $content = ob_get_clean();
require "views/commons/template.php"; ?>