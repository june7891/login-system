<?php ob_start(); ?>


<?php if (isset($_SESSION['id'])) {
    $username = explode(" ", $_SESSION['username'])[0];
    $email = explode(" ", $_SESSION['email'])[0];
    $id = explode(" ", $_SESSION['id'])[0];
}
?>


<h1>Bonjour, <?= $_SESSION['username']; ?> !</h1>


<div class="profil">
    <h1>Ton profil</h1>
    <div class="profil-photo">
        <div class="photouser"> <img src="<?php if (!empty($user['profilePhoto'])) { ?>
            <?= URL ?>public/images/<?php echo $user['profilePhoto'];
                                            } else { ?>https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png

        <?php } ?>" alt="" style="width:100%; height:100%; border-radius:10px">

        </div>




        <div class="username"><?= $username ?></div>
    </div>
</div>

<div class="share">
    <h1>Fais ta propre carte de Triper!</h1>
    <a href="<?= URL ?>account/cardTriper/<?= $id ?>"><button class="btn">Personnaliser</button></a>
</div>



<div class="container-account">


    <div class="form-account">

        <div class="left">


            <form action="<?= URL ?>account/show/updateAccount" method="post" enctype='multipart/form-data'>

                <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?? "" ?>" />


                <label for="pseudo">pseudo</label>
                <input type="text" name="pseudo" id="pseudo" value="<?= $username ?? "" ?>">


                <label for="lastname">nom :</label>
                <input type="text" name="lastname" id="lastname" value="<?= $user['lastname'] ?? "" ?>">

                <label for="firstname">prénom :</label>
                <input type="text" name="firstname" id="pseudo" value="<?= $user['firstname'] ?? ""  ?>">
                <label for="phoneNumber">téléphone</label>
                <input type="tel" name="phoneNumber" id="phoneNumber" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" value="<?= $user['phoneNumber'] ?? ""  ?>">

                <label for="dateOfBirth">date de naissance</label>
                <input type="text" name="dateOfBirth" id="dateOfBirth" value="<?= $user['dateOfBirth'] ?? "" ?>">

                <label for="address">adresse</label>
                <textarea rows="10" cols="57" name="address" id="address" value="<?= $user['address'] ?? "" ?>"></textarea>

        </div>

        <div class="right">
            <label for="occupation">métier</label>
            <input type="text" name="occupation" value="<?= $user['occupation']  ?>">

            <label for="email">email</label>
            <input type="email" name="email" id="email" value="<?= $email ?>">

            <p>mot de passe<a href="<?= URL ?>remindPassword"> modifier</a></p>
            <p>galerie photo perso : <a href="<?= URL ?>gallery/show"><img src="../images/camera.svg" alt=""></a> </p>
            <p>préférences <a href="<?= URL ?>account/preferences">modifier</a></p>

            <label for="image">photo de profil</label>
            <p><img src="<?= URL ?>public/images/<?php echo $user['profilePhoto'] ?>" alt="" style="width:50px; height:50px; border-radius: 10px"> </p>
            <input class="btn-form" src="" type='file' name='image' multiple />
            
            <button class="btn-form" type="submit">Modifier</button>
            </form>
            <a href="<?php URL ?>deleteAccount/<?php $id ?>" onClick="return confirm('Veux-tu vraiment supprimer ton compte ?');">supprimer mon compte</a>
        </div>

    </div>
</div>



<?php
$content = ob_get_clean();
require "views/commons/template.php";
