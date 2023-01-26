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


    try {
        $ipserver = "127.0.0.1";
        $nomBase = "Medecin";
        $loginPrivilege = "root";
        $passPrivilege = "root";
        $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

    ?>
        <?php
        $requete = "select * from Medecin";
        $resultat = $GLOBALS["pdo"]->query($requete);
        $tabMedecin = $resultat->fetchALL();

        $requete2 = "select * from Patient";
        $resultat2 = $GLOBALS["pdo"]->query($requete2);
        $tabPatient = $resultat2->fetchALL();
        ?>
        <form action="" method="post">
            <select name="idMedecin">
                <?php
                foreach ($tabMedecin as $Medecin) {
                    echo '<option value=" ' . $Medecin["id"] . '"> ' . $Medecin["nom"] . " " . $Medecin["prenom"] . '</option>';
                }
                ?>

            </select>
            <br>
            <select name="idPatient">
                <?php
                foreach ($tabPatient as $Patient) {
                    echo '<option value=" ' . $Patient["id"] . '"> ' . $Patient["nom"] . " " . $Patient["prenom"] . '</option>';
                }
                ?>

            </select>
            <br>
            <input type="datetime-local" id="meeting-time" name="meeting-time" value="2023-01-25T15:30" min="2023-01-25T00:00" max="2030-12-30T00:00">

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