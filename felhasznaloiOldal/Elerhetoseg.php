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
    <title>Elérhetőség</title>

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
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Osszeallitas.php">Összeállítások</a>
            </li>
            <li class="nav-item active">
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
<h2>Elérhetőség</h2>
<p>Itt küldhetsz nekem üzenetet! Szívesen fogadok építő jellegű kritikát az oldallal kapcsolatban.☺</p>


<?php
if (isset($_POST["submit"])) {
    include "../mailer.php";
}
?>

<form action="Elerhetoseg.php" method="POST" class="form_send margin-center">

    <div class="form-group">
        <label for="targy">Levél tárgya</label>
        <input class="form-control" type="text" name="targy" value=""/>
    </div>

    <div class="form-group">
        <label for="uzenet">Levél tartalma</label>
        <textarea class="form-control" name="uzenet" cols="50" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="kuldoNeve">Küldő neve</label>
        <input class="form-control" type="text" name="kuldoNeve"/>
    </div>

    <div class="form-group">
        <label for="kuldoEmail">Küldő email címe</label>
        <input class="form-control" type="text" name="kuldoEmail"/>
    </div>

    <div class="form-group" style="padding-bottom: 20px">
        <input type="submit" class="btn btn-primary" name="submit" value="Küldés"/>
    </div>
</form>


</body>
</html>