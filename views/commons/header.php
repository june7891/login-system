<?php require_once "utils/functions.php" ?>

<header>
    <nav>
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <?php if (!Security::verifAccessSession()) : ?>
                    <ul>
                        <a href="<?= URL ?>accueil">
                            <li>Accueil</li>
                        </a>
                        <a href="<?= URL ?>login">
                            <li>Se connecter</li>
                        </a>
                        <a href="<?= URL ?>signup">
                            <li>S'inscrire</li>
                        </a>
                    </ul>
        </div>

        <div class="logo">
            <img src="<?php URL ?>images/logo.svg" alt="">
        </div>
        <div class="login">
            <a href="<?= URL ?>account/show"><img src="<?= URL ?>/images/login.svg" alt=""></a>
        </div>

    <?php else : ?>


        <ul>
            <a href="<?= URL ?>accueil">
                <li>Accueil</li>
            </a>
            <a href="<?= URL ?>gallery/show">
                <li>Ta galerie photos</li>
            </a>
            <a href="<?= URL ?>account/cardTriper">
                <li>Ta carte de Triper</li>
            </a>
            <a href="<?= URL ?>account/show">
                <li>Ton profil</li>
            </a>
            <a href="<?= URL ?>logout">
                <li>Se déconnecter</li>
            </a>
        </ul>

        </div>
        <div class="logo">
            <img src="<?= URL ?>images/logo.svg" alt="">
        </div>

        <div class="login">
            <div class="icon-container">
                <div class="loggedin-icon">
                    <div class="profile-photo">
                        <a href="<?= URL ?>account/show"> <img src="https://picsum.photos/200/300" /></a>
                    </div>
                </div>
                <p><?= $_SESSION['username'] ?></p>
            </div>
        </div>



    <?php endif; ?>



    </nav>

</header>