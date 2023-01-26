<?php session_start()?> 
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Exercice final</title>
        <link rel="stylesheet" href="style.css">                                                                                                    
        <script src="script.js"></script>    
    </head>

    <body>

        <p id="titre">Ecrire une fonction qui affiche un formulaire de connexion à une page et qui prend en 
            paramètre un mot de pass Cette fonction vérifie que le mot de pass saisie dans le formulaire est 
            le même que celui passé en paramètre avec la méthode POST Appeler cette fonction dans votre code puis :
            si elle retourne ok afficher que vous avez le bon mot de pass et afficher un lien
            secret vers une page secret. sinon afficher que le mot de pass n’est pas bon et ré-appeler la fonction. 
        </p>
        <?php

        function Mafonction($mdp)
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

        $jaaaj = "Clément";
        Mafonction($jaaaj);
  
        ?>

    </body>
            
</html>