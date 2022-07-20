
<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>
    <h1>Bon retour, Triper !</h1>

    <?php flash('login') ?>

    <div class="form">
    <form method="post" action="./controllers/Users.php">
    <input type="hidden" name="type" value="login">
        <input type="text" name="username/email"  
        placeholder="pseudo/email">
        <input type="password" name="password"
        placeholder="mot de passe">
        <p class="cross" ><input class="check"type="checkbox" name="check" id="">se souvenir de moi</p>
        <button type="submit" name="submit">Se connecter</button>

        <div class="inscription">
        <p class="password"><a href="./remind-password.php">mot de passe oublié</a></p>
        <p >pas de compte ?<a href="signup.php">s'inscrire</a></p>
        </div>
    </form>
    
</div>
    
<?php 
    include_once 'footer.php'
?>