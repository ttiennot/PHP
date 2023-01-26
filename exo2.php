<?php
    function Mafonction($col1, $col2 ,$col3){
        ?>
            <table border="2">
                <tr> 
                    <th><= $col1></th>
                    <tr></tr>
                    <th><= $col2> </th>
                    <th><= $col3> </th>
                </tr>

            </table>
        <?php
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo 2</title>
</head>
<body>
    <?php

    Mafonction("fruit", "legume", "autre");
    ?>
    <p><a href="PageDeGarde.php">Retour</a></p>
</body>
</html>