<!DOCTYPE html>

<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Kezdőlap</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../stilusCSS/KezOsszElerStilus.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["felh_nev"])) {
    echo '<div class="card bg-dark text-white" style="border-radius: 0;">
<div class="card-body"> Üdv ' . $_SESSION['felh_nev'] . '!</div>
</div>';
}
?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../felhasznaloiOldal/Kezdolap.php">Kezdőlap</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Osszeallitas.php">Összeállítások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Elerhetoseg.php">Elérhetőség</a>
            </li>
            <?php
            if ($_SESSION["loggedin"]) {
                echo '<li class="nav-item">
            <a class="nav-link" href="../felhasznaloiOldal/JelszoModositas.php">Jelszó módosítás</a>
        </li>';
            }
            ?>
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
<div id="tartalom">
    <h2>Kezdőlap</h2>
    <p>Üdv az oldalamon. Az oldalon különböző konfigurációkat tesztelhetsz. Az adatok megadása után lentebb egy
        táblázatban tekintheted meg a komponensek besorolását. A besorolás 1-től 4-ig történik, ahol 1 a legalsó
        kategória, 4 pedig a legmagasabb.</p>
    <p>Saját konfigurációt is összeállíthatsz, ehhez regisztrálnod kell, amit a menü 'regisztráció' pontján tehetsz
        meg.</p>
    <p>Üzeneted lenne számomra? Vagy szeretnél csatlakozni admin csoportba, ahol te is naprakészen tarthatod az oldalt?
        Dobj egy e-mailt a menü 'elérhetőség' pontján.</p>


    <form action="Kezdolap.php" method="post"
    ">
    <label for="felhCPU">CPU:</label>
    <select id="felhCPU" name="felhCPU" class="custom-select mb-3">
        <?php
        include_once "../nevekLista/adatLista.php";
        new adatLista("cpu")
        ?>

    </select>
    <label for="felhGPU">GPU:</label>
    <select id="felhGPU" name="felhGPU" class="custom-select mb-3">
        <?php
        include_once "../nevekLista/adatLista.php";
        new adatLista("gpu");
        ?>
    </select>
    <label for="felhRAM">RAM:</label>
    <select id="felhRAM" name="felhRAM" class="custom-select mb-3">
        <?php
        include_once "../nevekLista/adatLista.php";
        new adatLista("ram");
        ?>
    </select>
    <button type="submit" class="btn btn-primary" name="ertekeles" id="ertekeles"
            style="margin-bottom: 1%; margin-left: 2%">Elküld
    </button>
    </form>

    <div class="table-responsive">
        <?php
        if (isset($_POST["ertekeles"])) {
            include_once "../ertekeles/ertekeles.php";
        }
        ?>
    </div>
</div>

</body>
</html>