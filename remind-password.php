<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>
    <h1>Mot de passe oublié</h1>

    <?php flash('remind') ?>

    <div class="form">
    <form method="post" action="./controllers/Users.php">
    <input type="hidden" name="type" value="remind">
        <input type="email" name="email"  
        placeholder="email">
        <button type="submit" name="submit">Envoyer</button>
    </form>
    
</div>
    
<?php 
    include_once 'footer.php'
?>