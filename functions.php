<html>

<body>
    <?php
    function tab($tab)
    {
        echo '<table border="2">';
        for ($i = 0; $i < 4; $i++) {
    ?>
            <tr>
                <?php
                echo "<td align= 'center'>" . $tab['NOM'][$i] . "</td>";
                echo "<td align='center'>" . $tab['PRENOM'][$i] . "</td>";
                ?>
            </tr>
    <?php
        }
        echo '</table>';
    }
    ?>


    <?php
    function moyenne($note)
    {
        $somme = 0;
        $compteur = 0;
        foreach ($note as $value) {
            $somme += $value;
            $compteur += 1;
        }
        $somme = $somme / $compteur;

        return $somme;
    }
    ?>

    <?php
    function affiche($note)
    {
        echo '<table border="2">';
        echo "<td align= 'center'>" . 'note :' . "</td>";
        foreach ($note as $value) {
    ?>
            <tr>
                <?php
                echo "<td align= 'center'>" . $value . "</td>";
            
                ?>
            </tr>
    <?php
        }
        echo '</table>';
    }
    ?>

    <?php
        function form()
        {
           
session_start();

if(isset($_POST['submit'])){
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification
    if($username === "admin" && $password === "password"){
        // Démarrer une nouvelle session
        $_SESSION['username'] = $username;
        header("Location: AfterLog.php");
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

<form method="post" action="">
  <label for="username">Nom d'utilisateur :</label>
  <input type="text" id="username" name="username">
  <br>
  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password">
  <br><br>
  <input type="submit" value="Connexion" name="submit">
</form>
<?php
        }
?>
    <?php
    function formPost($mdp)
{
    if(isset($_POST["Deconnexion"]))
    {   
        //Si on appuie sur le bouton "Deconnexion", on supprime les données de la session et on la détruit.
        session_unset();
        session_destroy();
    }
    if(isset($_POST["Valider"]) && $_POST["password"]==$mdp)
    {
            /*Si on a appuyé sur le bouton valider, que le mot de passe est "1234", 
            alors nous somme identifiés. On le met dans la variable "EtatConnexion" qu'on met à "true", soit vraie. */
            $_SESSION["EtatConnexion"] = true ; 
    }
    if(isset($_SESSION["EtatConnexion"]) && $_SESSION["EtatConnexion"]==true)
    {
        //Si on est connecté, alors on affiche "Bienvenue sur le site", avec un bouton de déconnexion.
    ?>       
        <p>Bienvenue sur le site</p>
        <form action="" method="post" class="form-example">
            <div class="form-example">
                <input type="submit" value="Deconnexion" name="Deconnexion" >
            </div>
        </form>

    <?php
          $code = file_get_contents($_SERVER['SCRIPT_FILENAME']);
          highlight_string($code);
    }
    else 
    {   //Sinon, on n'est pas encore connecté, alors on affiche le formulaire de connexion.
    ?>
        <form action="" method="post">
            <fieldset>
                <legend>Identifiant</legend>
                <p>
                    <label for="password">Mot de passe :</label> 
                    <input type="password" name="password" id="password" value="" /> 
                    <input type="submit" name="Valider" value="Valider" />
                </p>
            </fieldset>
        </form>
    <?php 
    }
    if(isset($_POST["Valider"])) //Si on appuie sur le bouton "Valider", et que soit le l'identifiant, soit le mot de passe est faux, on affiche les messages d'erreur.
    {
            if($_POST["password"]!=$mdp)
            {
                echo "<p>Ce n'est pas le bon mdp !</p>";
            }       
    }
}
?>
</body>

</html>