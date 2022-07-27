<?php ob_start();?>


<?php if(isset($_SESSION['id'])){
        $username = explode (" ", $_SESSION['username'])[0];
        $email = explode (" ", $_SESSION['email'])[0];   
        $id = explode (" ", $_SESSION['id'])[0];   
    }
        ?>


<h1>Bonjour, <?=$_SESSION['username']; ?> !</h1>


<div class="profil">
    <h1>Ton profil</h1>
    <div class="profil-photo">
        <div class="photouser"></div>
        <div class="pseudouser"><?=$username?></div>
    </div>
</div>

<div class="partage">
    <h1>Fais ta propre carte de Triper!</h1>
    <p><button type="submit"><a href="<?= URL ?>account/carteTriper">Personnaliser</a></button></p>
</div>



<div class="container">


    <div class="form-account">

        <form action="<?= URL ?>account/updateUsernameEmail" method="post" class="pseudo-email">
         
            <label for="pseudo">pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="<?=$username?>">
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="<?=$email?>">
            <button type="submit" name="submit">Modifier</button>
        </form>

        <form action="<?= URL ?>gallery/updateAccount" method="post">
         
            <label for="lastname">nom</label>
            <input type="text" name="lastname" id="lastname">

            <label for="firstname">prénom</label>
            <input type="text" name="firstname" id="firstname">

            <label for="phoneNumber">téléphone</label>
            <input type="tel" name="phoneNumber" id="phoneNumber" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
                placeholder="xx-xx-xx-xx-xx">

            <label for="dateOfBirth">date de naissance</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth">

            <label for="address">adresse</label>
            <input type="text" name="address" id="address">

            <label for="gender">genre</label>
            <select name="gender" id="gender">
                <option value="">--Choisir--</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>

            </select>
                <button type="submit">Enregister</button>

            <div class="modify-account">
                <p>mot de passe<a href="<?= URL ?>remindPassword"> modifier</a></p>
                <p>gallerie photo perso : <a href="<?= URL ?>gallery/show"><img src="../images/photos-non-3d.svg" alt=""></a> </p>
                <p>préférences <a href="<?= URL ?>account/preferences">modifier</a></p> 
                <a href="delete-account.php">supprimmer mon compte</a>
            </div>


        </form>

      
    </div>
</div>



<?php
$content = ob_get_clean();
$titre = "";
require "views/commons/template.php";