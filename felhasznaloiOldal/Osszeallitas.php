<?php
include_once "../felhEllenorzes.php";
(new FelhEllenorzes())->felhasznalo();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Összeállítás</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stilusCSS/KezOsszElerStilus.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
echo '<div class="card bg-dark text-white" style="border-radius: 0;">
    <div class="card-body"> Üdv ' . $_SESSION['felh_nev'] . '!</div>
  </div>';
?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Kezdolap.php">Kezdőlap</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../felhasznaloiOldal/Osszeallitas.php">Összeállítások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Elerhetoseg.php">Elérhetőség</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/JelszoModositas.php">Jelszó módosítás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../belepes/belepes.php">Kilépés</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../belepes/belepes.php">Bejelentkezés</a>
            </li>
            <li class="nav-item" style="float: right">
                <a class="nav-link" href="../regisztracio/regisztracio.php">Regisztráció</a>
            </li>
            <?php
            if (isset($_SESSION["adminLoggedIn"])) {
                echo "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"../admin/adminAdatFeltolt.php\">Admin</a>
        </li>";
            }
            ?>
        </ul>
    </div>
</nav>
<h2>Összeállítások</h2>
<p>Az alábbi "kártyákra" kattintva kiválaszthatod, hogy milyen felhasználási területre szeretnél konfigurációt
    összeállítani!</p>
<p>A konfiguráció kiválasztása után lehetőséged van pdf formátumba konvertálni az eredményt, ehhez nyomd meg a 'PDF
    generálás' gombot!</p>
<div style="padding: 2%">

    <div class="card-deck">
        <div class="card bg-primary">
            <form action="Osszeallitas.php" method="post" style="all: unset">
                <!--<div class="card-body text-center">-->
                <input type="number" name="film" id="film" value="1" hidden>
                <button type="submit" class="card-body text-center" name="filmGomb" id="filmGomb"
                        style="border: 0px solid black; background-color: transparent; width: 100%; top: 0; bottom: 0">
                    Filmezés,Netezés
                </button>
                <!-- </div>-->
            </form>
        </div>
        <div class="card bg-warning">
            <form action="Osszeallitas.php" method="post" style="all: unset">
                <!--<div class="card-body text-center">-->
                <input type="number" name="iroda" id="iroda" value="2" hidden>
                <button type="submit" class="card-body text-center" name="irodaGomb" id="irodaGomb"
                        style="border: 0px solid black; background-color: transparent; width: 100%; top: 0; bottom: 0">
                    Irodai munkák
                </button>
                <!-- </div>-->
            </form>
        </div>
        <div class="card bg-success">
            <form action="Osszeallitas.php" method="post" style="all: unset">
                <!--<div class="card-body text-center">-->
                <input type="number" name="jatek" id="jatek" value="3" hidden>
                <button type="submit" class="card-body text-center" name="jatekGomb" id="jatekGomb"
                        style="border: 0px solid black; background-color: transparent; width: 100%; top: 0; bottom: 0">
                    Játék
                </button>
                <!-- </div>-->
            </form>
        </div>
        <div class="card bg-danger">
            <form action="Osszeallitas.php" method="post" style="all: unset">
                <!--<div class="card-body text-center">-->
                <input type="number" name="video" id="video" value="4" hidden>
                <button type="submit" class="card-body text-center" name="videoGomb" id="videoGomb"
                        style="border: 0px solid black; background-color: transparent; width: 100%; top: 0; bottom: 0">
                    Videó vágás,Kép szerkesztés
                </button>
                <!-- </div>-->
            </form>
        </div>
    </div>


    <form action="../pdfGeneralas.php" method="post" target="_blank">

        <?php
        if (isset($_POST["filmGomb"])) {
            include "../nevekLista/inputAdatok.php";
            //include_once "../pdfGeneralas.php";
            new inputAdatok($_POST["film"]);
            echo '<button type="submit" class="btn btn-primary" name="ertekeles" id="ertekeles" formaction="Osszeallitas.php" formtarget="_parent" style="margin: 0px 2px 0px 2px;">Értékelés</button>';
            echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"PDF\" id=\"PDF\" style=\"margin: auto;\">PDF generálás
        </button>";
        }
        if (isset($_POST["irodaGomb"])) {
            include "../nevekLista/inputAdatok.php";
            new inputAdatok($_POST["iroda"]);
            echo '<button type="submit" class="btn btn-primary" name="ertekeles" id="ertekeles" formaction="Osszeallitas.php" formtarget="_parent" style="margin: 0px 2px 0px 2px;">Értékelés</button>';

            echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"PDF\" id=\"PDF\" style=\"margin: auto;\">PDF generálás
        </button>";
        }
        if (isset($_POST["jatekGomb"])) {
            include "../nevekLista/inputAdatok.php";
            new inputAdatok($_POST["jatek"]);
            echo '<button type="submit" class="btn btn-primary" name="ertekeles" id="ertekeles" formaction="Osszeallitas.php" formtarget="_parent" style="margin: 0px 2px 0px 2px;">Értékelés</button>';

            echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"PDF\" id=\"PDF\" style=\"margin: auto;\">PDF generálás
        </button>";
        }
        if (isset($_POST["videoGomb"])) {
            include "../nevekLista/inputAdatok.php";
            new inputAdatok($_POST["video"]);
            echo '<button type="submit" class="btn btn-primary" name="ertekeles" id="ertekeles" formaction="Osszeallitas.php" formtarget="_parent" style="margin: 0px 2px 0px 2px;">Értékelés</button>';

            echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"PDF\" id=\"PDF\" style=\"margin: auto;\">PDF generálás
        </button>";
        }
        ?>
    </form>
    <div class="table-responsive">
        <?php
        include "../ertekeles/ertekeles.php";
        ?>
    </div>

</body>
</html>