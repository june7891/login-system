<?php ob_start();?>


<div class="container">

<p>Prénom</p>
<p>Nom</p>
<p>Age</p>
<p>Métier</p>

<div>
    <p>mes voyages</p>
    <p>mes points</p>
    <p>transport préféré</p>
    <p>inscrit(e) depuis : </p>
    <p>likes</p>
    <p>destination préférée</p>

</div>

<div>
    <p>Photos</p>

</div>




    

<div class="share">
    <h3>tu veux modifier ta carte ?</h3>
    <button type="submit"><a href="<?= URL ?>carteTriper/modifier">Modifier</a></button>
</div>
       
</div>





<?php $content = ob_get_clean();
$titre = "";
require "views/commons/template.php";