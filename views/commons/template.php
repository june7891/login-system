<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slider.style.css">
    <link rel="stylesheet" type="text/css" href="css/searchForm.style.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">

    <title>Document</title>
</head>

<body>
    <?php require_once("views/commons/menu.php") ?>
    <div>
        <h1><?= $titre ?></h1>
        <?= $content ?>
    </div>


    <?php require_once("views/commons/footer.php") ?>
</body>

</html>