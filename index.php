<?php 
    include_once 'header.php'
?>

    <h1 id="index-text">Welcome, <?php if(isset($_SESSION['username'])){
        echo explode(" ", $_SESSION['username'])[0]; 
        
        echo ":)";
        
    }else{
        echo 'Guest :)';
    } 
    ?> </h1>
    

<?php 
    include_once 'footer.php'
?>