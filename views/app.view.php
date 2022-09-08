<?php ob_start();?>


<h1>Prochainement...</h1>

<div class="images-app">
<img src="images/app/2.png" alt="app"> 
<img src="images/app/1.png" alt="app">

</div>




<?php $content = ob_get_clean();
require "views/commons/template.php"; ?>