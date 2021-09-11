<?php
include_once "../felhEllenorzes.php";
(new FelhEllenorzes())->felhasznalo();
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Jelszó módosítás</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Osszeallitas.php">Összeállítások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Elerhetoseg.php">Elérhetőség</a>
            </li>
            <li class="nav-item active">
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

<h2>Jelszó módosítás</h2>
<p>Régi, majd új jelszavad megadásával frissítheted bejelentkezési jelszavadat!</p>
<p>Elfelejtetted régi jelszavad és nem szeretnél új felhasználót regisztrálni? Írj egy e-mailt és amint tudok segítek
    ;)</p>
<form action="JelszoModositas.php" method="post">
    <label for="regiJelszo">Régi jelszó</label>
    <input type="password" class="form-control" id="regiJelszo" name="regiJelszo" minlength="8" required>

    <label for="ujJelszo">Új jelszó</label>
    <input type="password" class="form-control" id="ujJelszo" name="ujJelszo" minlength="8" required>

    <button type="submit" class="btn btn-primary" id="jszModGomb" name="jszModGomb" style="margin: 1%">Módosítás
    </button>
</form>
<?php
include "../adatFrissites.php";
(new AdatFrissites())->jelszoFrissit();
?>
</body>
</html>
