<?php
session_unset();
//session_start();

?>
<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <title>Belépés</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link href="../stilusCSS/stiluslap.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>
        <?php
        include 'log.php';

        ?>


        <form action="belepes.php" method="post">
            <fieldset style="-webkit-border-radius: 8px;
                      -moz-border-radius: 8px;
                      border-radius: 8px;">
                <legend style="float: inside">Belépés</legend>
                <div id="tartalom">
                    <label for="fnev">Felhasználó neve: </label>
                    <input type="text" name="fnev" id="fnev" placeholder="felhasználónév" required>
                    <!br>
                    <label for="jelszo">Jelszó: </label>
                    <input type="password" name="jelszo" id="jelszo" minlength="6" maxlength="12" required>
                    <!br>
                </div>
                <input type="submit" value="Belépés" class="bt" id="bt" name="btlog"  onmouseover="this.style.color = 'blue';" onmouseout="this.style.color = 'black';">
                <br>
                Még nem vagy tag? <a href="../regisztracio/regisztracio.php" id="href" onmouseover="this.style.color = 'blue';" onmouseout="this.style.color = 'lightskyblue';">->Regisztrálj<-</a>
            </fieldset>
        </form>



    </body>
</html>
