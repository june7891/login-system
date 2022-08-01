<?php ob_start();?>


<h1>Bienvenue, <?=$user['username']?> !</h1>

 <h2>Voici le profil de <?= $user['lastname'] . $user['firstname']; ?></h2>
  <div>Quelques informations sur vous : </div>
    <ul>
      <li>Votre id est : <?= $_SESSION['id'] ?></li>
      <li>Votre mail est : <?= $_SESSION['email']?></li>
      <li>Votre compte a été crée le : <?= $user['account_created_at'] ?></li>
    </ul>

<?php
$content = ob_get_clean();
$titre = "Page accueil utilisateur";
require "views/commons/template.php";