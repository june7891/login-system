<?php 
    include_once 'header.php';
    include_once './inc/functions.php';
    include_once './helpers/session_helper.php';
    

?>

<?php 


only_logged();

if(isset($_SESSION['id'])){
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
    <h1>Partage tes photos !</h1>
    <p><button type="submit"><a href="upload-images.php">Envoyer</a></button></p>
</div>



<div class="container">


    <div class="form-account">

        <form action="./controllers/Users.php" method="post" class="pseudo-email">
            <input type="hidden" name="type" value="modify-email-username">
            <label for="pseudo">pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="<?=$username?>">
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="<?=$email?>">
            <button type="submit" name="submit">Modifier</button>
        </form>

        <form action="./controllers/Users.php" method="post">
            <input type="hidden" name="type" value="update-account">


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


            <div class="modify-account">
                <p>mot de passe</p><a href="change-password.php">modifier</a>
                <p>gallerie photo perso : </p> <a href="gallery.php"><img src="" alt="">picto appareil photo</a>
                <p>préférences </p> <a href="preferences.php">modifier</a>

                <button type="submit">Enregister</button>
            </div>


        </form>

        <a href="delete-account.php">supprimmer mon compte</a>
    </div>
</div>

<?php require_once "footer.php"?>