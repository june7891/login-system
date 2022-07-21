<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>

<h1>Deviens un triper !</h1>



<div class="form">

    <form method="post" action="./controllers/Users.php">
        <?php flash('register') ?>
        <input type="hidden" name="type" value="register">
        <input type="text" name="username" placeholder="pseudo">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="mot de passe">
        <input type="password" name="confirm_password" placeholder="confirme ton mot de passe">
        <p class="cross"><input class="check" type="checkbox" name="check" id="">recevoir la newsletter</p>
        <button type="submit" name="submit">s'inscrire</button>
        <p class="connection">déjà un compte ? <a href="login.php">Se connecter</a></p>
    </form>
</div>
<?php 
    include_once 'footer.php'
?>