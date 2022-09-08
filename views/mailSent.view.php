<?php ob_start();?>


<h2>Ton mail a été bien envoyé</h2>
<img src="<?php URL ?>images/mail.svg" alt="">



<?php $content = ob_get_clean();
require "views/commons/template.php"; ?>