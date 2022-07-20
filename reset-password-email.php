<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>
    <h1>Changer le mot de passe avec le lien par email</h1>

    <?php flash('reset-with-email') ?>

    <div class="form">
    <form method="post" action="./controllers/Users.php">
    <input type="hidden" name="type" value="reset-with-email">
        <input type="password" name="new-password"  
        placeholder="nouveau mdp">
        <input type="password" name="repeat-new-password"
        placeholder="confirm nouveau mdp">
        <button type="submit" name="submit">Modifier</button>

        <div class="reset">
        <a href="index.php">profil</a></p>
        </div>
    </form>
    
</div>
    
<?php 
    include_once 'footer.php'
?>