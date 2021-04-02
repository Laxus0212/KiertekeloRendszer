<?php
include '../admin.php';
if (!isset($_SESSION["szuperAdminLoggedIn"])) {
    header("Location: ../belepes/belepes.php");
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Jogosultságok</title>
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
                <a class="nav-link" href="../admin/adminAdatFeltolt.php">Adatfelvitel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/adminFelhTorol.php">Felhasználó törlés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/adminProcTorol.php">CPU törlés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/adminGPUTorol.php">GPU törlés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/adminRAMTorol.php">RAM törlés</a>
            </li>
            <li class="nav-item">
                <form action="../pdfGeneralas.php" method="post">
                    <button class="nav-link" type="submit" name="adminPDF" id="adminPDF"
                            style="background-color: transparent; border: 0">Konfigurációk PDF
                    </button>
                </form>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/adminJogosultsagok.php">Jogosultságok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../belepes/belepes.php">Kilépés</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../felhasznaloiOldal/Kezdolap.php">Kezdőlap</a>
            </li>
        </ul>
    </div>
</nav>
<h2>Jogosultságok megváltoztatása</h2>
<p>A listából kiválasztott felhasználónak vagy adminnak változtathatja meg a jogosultságait a megfelelő gombra
    kattintva!</p>

<form action="../admin/adminJogosultsagok.php" method="post" style="margin: 2%">
    <select multiple class="form-control col" id="jog1" name="jog1" style="width: 49%">
        <?php
        include_once "../nevekLista/adatLista.php";
        new adatLista("szadatok", "admin=0");
        ?>
    </select>
    <button type="submit" class="btn btn-primary" id="felhJog" name="felhJog" style="margin: 1%">Adminná tesz</button>


    <select multiple class="form-control col" id="jog2" name="jog2" style="width: 49%">
        <?php
        new adatLista("szadatok", "admin=1");
        ?>
    </select>
    <button type="submit" class="btn btn-primary" id="adminJog" name="adminJog" style="margin: 1%">Felhasználóvá tesz
    </button>
    <?php
    if ($_POST) {
        include_once "../jogValtas.php";
    }
    ?>
</form>
</body>
</html>