
<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>
   

    



    <h1>Ajouter les Images</h1>

<div class="form">

<form method='post' action='' enctype='multipart/form-data'>
        <?php flash('upload-images') ?>
    <input type="text" name="title" placeholder="titre">
    <input type='file' name='my_image' multiple />

    <button type="submit" name="submit"> Envoyer</button>
    
</form>
</div>



<a href="gallery.php">Voir les images</a>


    
<?php 
    include_once 'footer.php'
?>