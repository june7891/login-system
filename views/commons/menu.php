
<?php require_once "utils/functions.php" ?>

<header>
    <nav>
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">

        <ul>
        <?php if(!Security::verifAccessSession()) :?>
                <a href="<?= URL?>/login">Login</a>

                <?php else :?>

          
                <a href="<?= URL?>login"><li>Sign Up</li></a>
                <a href="<?= URL?>changePassword"><li>Modifier mot de passe</li></a>
                <a href="<?= URL?>gallery/show"><li>Ta galérie photos</li></a>
                <a href="<?= URL?>account"><li>Ton profil</li></a>
                <a href="<?= URL?>logout"><li>Logout</li></a>
            <?php endif; ?>
        </ul>

        </div>
        <div class="logo">
            <img src="./images/logo.svg" alt="">
        </div>
        <div class="login">
            <a href="login.php"><img src="./images/login.svg" alt=""></a>
            
        </div>
    </nav>

</header>