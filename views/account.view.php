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
        <div class="photouser"> <img src="<?php if (!empty($user['profilePhoto'])) {?>
             ../public/images/<?php echo $user['profilePhoto'];
        } else {?>https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png

        <?php } ?>" alt="" style="width:100%; height:100%; border-radius: 10px">
       

           
      
        </div>
            
        
        
        
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



        <form action="<?= URL ?>account/modifyAccount/<?= $_SESSION['id'] ?>" method="post" enctype = 'multipart/form-data'>
         
        <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>" />
        
            <label for="lastname">nom :</label>
            <p><?php echo $user['lastname']?></p>

            <label for="firstname">prénom :</label>
            <p><?php echo $user['firstname']?></p>

            <label for="phoneNumber">téléphone</label>
            <p><?php echo $user['phoneNumber']?></p>

            <label for="dateOfBirth">date de naissance</label>
            <p><?php echo $user['dateOfBirth']?></p>

            <label for="address">adresse</label>
            <p><?php echo $user['address']?></p>

            <label for="gender">genre</label>
            <p><?php echo $user['gender']?></p>
           
            <label for="image">photo de profil</label>
            <p><img src="../public/images/<?php echo $user['profilePhoto']?>" alt="" style="width:50px; height:50px; border-radius: 10px"> </p>

            <button type="submit">Modifier</button>
          
                
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