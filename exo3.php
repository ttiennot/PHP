<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo 3</title>
</head>

<body>
    <?php
    include 'functions.php';
    $note = array(1, 7, 10, 4, 5);
    affiche($note);
    moyenne($note);
    $somme = moyenne($note);
    echo "la moyenne est ".$somme;

    ?>
    <p><a href="PageDeGarde.php">Retour</a></p>
</body>

</html>