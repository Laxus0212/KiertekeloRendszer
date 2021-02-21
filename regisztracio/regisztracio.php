

<!DOCTYPE html>

<html lang="hu-HU">
    <head>
        <title>Regisztráció</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       
        <link href="../stilusCSS/stiluslap.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <?php
        include 'reg.php';
        ?>
        <form action="regisztracio.php" method="post" width="100%;">
            <fieldset style="-webkit-border-radius: 8px;
                      -moz-border-radius: 8px;
                      border-radius: 8px;">
                <legend style="float: inside">Regisztráció</legend>
                <div id="tartalom">
                    <label for="fnev">Felhasználó neve: </label>
                    <input type="text" name="fnev" id="fnev" placeholder="felhasználónév" required>
                    <!br>
                    <label for="datum">Születési dátum: </label>
                    <input type="date" name="datum" id="datum" required>
                    <!br>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>
                    <!br>
                    <label for="jelszo">Jelszó: </label>
                    <input type="password" name="jelszo" id="jelszo" minlength="6" maxlength="12" required>
                    <!br>
                    <label for="jelszo2">Jelszó újra: </label>
                    <input type="password" name="jelszo2" id="jelszo2" minlength="6" maxlength="12" required>
                    <!br>

                </div>

                <input type="submit" value="Regisztráció" class="bt" id="btreg" name="btreg"  onmouseover="this.style.color = 'blue';" onmouseout="this.style.color = 'black';">
                <br>
                Már tag vagy? <a href="../belepes/belepes.php" id="href" onmouseover="this.style.color = 'blue';" onmouseout="this.style.color = 'lightskyblue';">->Belépés<-</a>

            </fieldset>
        </form>
    </body>
</html>