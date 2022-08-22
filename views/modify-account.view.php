<?php ob_start();?>


<div class="container">


    <div class="form-account">

        <form action="<?= URL ?>account/updateUsernameEmail" method="post" class="pseudo-email">
         
            <label for="pseudo">pseudo</label>
            <input type="text" name="username" id="pseudo" placeholder="<?=$user['username']?>">
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="<?=$user['email']?>">
            <button type="submit" name="submit">Modifier</button>
        </form>

        <form action="<?= URL ?>account/updateAccount/<?= $_SESSION['id'] ?>" method="post" enctype = 'multipart/form-data'>
         
        <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>" />
        
            <label for="lastname">nom</label>
            <input type="text" name="lastname" id="lastname" value="<?= $user['lastname'] ?>">

            <label for="firstname">prénom</label>
            <input type="text" name="firstname" id="firstname" value="<?= $user['firstname'] ?>" >

            <label for="phoneNumber">téléphone</label>
            <input type="tel" name="phoneNumber" id="phoneNumber" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
            value="<?= $user['phoneNumber'] ?>">

            <label for="dateOfBirth">date de naissance</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?= $user['dateOfBirth'] ?>">

            <label for="address">adresse</label>
            <input type="text" name="address" id="address" value="<?= $user['address'] ?>" >

            <label for="gender">genre</label>
            <select name="gender" id="gender">
                <option value="<?= $user['gender'] ?>"></option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>

            </select>
           
            <label for="image">photo de profil</label>
            <img src="<?= URL ?>public/images/<?php echo $user['profilePhoto']?>" alt="" style="width:100px; height:100px; border-radius: 10px">
            <input src ="" type='file' name='image' multiple />


            <button type="submit">Enregister</button>


        </form>

      
    </div>
</div>



<?php
$content = ob_get_clean();
$titre = "";
require "views/commons/template.php";