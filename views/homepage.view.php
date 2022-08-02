<?php ob_start();?>


<h1>Bienvenue, <?=$user['username']?> !</h1>

 <h2>Voici le profil de <?= $user['lastname'] ." ". $user['firstname']; ?></h2>
  <div>Quelques informations sur vous : </div>
    <ul>
      <li>Ton id est : <?= $user['id'] ?></li>
      <li>Ton mail est : <?= $user['email']?></li>
      <li>Ton compte a été crée le : <?= $user['account_created_at'] ?></li>
      <a href="<?= URL ?>account/show">Modifier</a>
    </ul>

<?php
$content = ob_get_clean();
$titre = "Page accueil utilisateur";
require "views/commons/template.php";