<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDD</title>

</head>

<body>

    <?php
    include 'functions.php';
    $mdp = 'caca';
    formPost($mdp);

    try {
        $ipserver = "127.0.0.1";
        $nomBase = "Tibo";
        $loginPrivilege = "root";
        $passPrivilege = "root";
        $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

    ?>
        <?php
        $requete = "select * from login";
        $resultat = $GLOBALS["pdo"]->query($requete);
        $tabMedecin = $resultat->fetchALL();

        $requete2 = "select * from password";
        $resultat2 = $GLOBALS["pdo"]->query($requete2);
        $tabPatient = $resultat2->fetchALL();
        ?>
        <form action="" method="post">
            <select name="prenom">
                <?php
                foreach ($tabMedecin as $Medecin) {
                    echo '<option value=" ' . $Medecin["id"] . '"> ' . $Medecin["nom"] . " " . $Medecin["prenom"] . '</option>';
                }
                ?>

            </select>
            <br>
            <select name="nom">
                <?php
                foreach ($tabPatient as $Patient) {
                    echo '<option value=" ' . $Patient["id"] . '"> ' . $Patient["nom"] . " " . $Patient["prenom"] . '</option>';
                }
                ?>

            </select>
            <br>

            <input type="submit" name="envoyer" value="envoyer">




        </form>
        <?php
        if (isset($_POST['envoyer'])) {
            echo 'L id du medecin est :' . $_POST['idMedecin'];
        ?>
            <br>
            <?php
            echo 'L id du patient est :' . $_POST['idPatient'];
            ?>
            <br>
    <?php
            $requete3 = "INSERT INTO `Consultation`( `Dateheure`, `idMedecin`, `idPatient`) VALUES ('" . $_POST['meeting-time'] . "','" . $_POST['idMedecin'] . "','" . $_POST['idPatient'] . "')";
            $resultat3 = $GLOBALS["pdo"]->query($requete3);
        }
    } catch (Exception  $error) {
        echo "error est : " . $error->getMessage();
    }
    ?>
</body>

</html>
