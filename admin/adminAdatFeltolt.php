<?php
include '../admin.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Adatfeltöltés</title>
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
            <li class="nav-item active">
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
                            style="background-color: transparent; border: 0;">Konfigurációk PDF
                    </button>
                </form>
            </li>
            <?php
            if (isset($_SESSION["szuperAdminLoggedIn"])) {
                echo '<li class="nav-item">
                     <a class="nav-link" href="../admin/adminJogosultsagok.php">Jogosultságok</a>
                  </li>';
            }
            ?>
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

<h2>Adatfeltöltés</h2>
<p>Az adatok kitöltése után a 'Feltölt' gombra kattintva új adatot vihet fel az adatbázisba!</p>
<form action="adminAdatFeltolt.php" method="post" style="margin: 2%">
<div class="row">
    <div class="form-group ml-2">
        <label for="cpu">CPU:</label>
        <input type="text" class="form-control" id="cpu" name="cpu">
        <label for="CPUbenchmark">benchmark:</label>
        <input type="number" class="form-control" id="CPUbenchmark" name="CPUbenchmark" min="1" max="4">
        <label for="CPUlink">link:</label>
        <input type="text" class="form-control" id="CPUlink" name="CPUlink">
        <label for="CPUar">Ár:</label>
        <input type="number" class="form-control" id="CPUar" name="CPUar" min="0">
    </div>
    <div class="form-group ml-2">
        <label for="gpu">GPU:</label>
        <input type="text" class="form-control" id="gpu" name="gpu">
        <label for="GPUbenchmark">benchmark:</label>
        <input type="number" class="form-control" id="GPUbenchmark" name="GPUbenchmark" min="1" max="4">
        <label for="GPUlink">link:</label>
        <input type="text" class="form-control" id="GPUlink" name="GPUlink">
        <label for="GPUar">Ár:</label>
        <input type="number" class="form-control" id="GPUar" name="GPUar" min="0">
    </div>
    <div class="form-group ml-2">
        <label for="ram">RAM:</label>
        <input type="text" class="form-control" id="ram" name="ram">
        <label for="RAMbenchmark">GB:</label>
        <input type="number" class="form-control" id="RAMbenchmark" name="RAMbenchmark" step="2" min="2" max="64">
        <label for="RAMlink">link:</label>
        <input type="text" class="form-control" id="RAMlink" name="RAMlink">
        <label for="RAMar">Ár:</label>
        <input type="number" class="form-control" id="RAMar" name="RAMar" min="0">

    </div>
</div>

    <button type="submit" class="btn btn-primary" name="feltolt" style="margin: 2%">Feltölt</button>
</form>
<?php
if (isset($_POST["feltolt"])) {
    include "../adatFeltolt.php";
}
?>

</body>
</html>