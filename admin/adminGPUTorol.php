<?php
include '../admin.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>GPU törlés</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../stilusCSS/KezOsszElerStilus.css" />
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
                <li class="nav-item active">
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
        <h2>GPU törlés</h2>
        <p>A listából kiválasztott GPU, majd 'Töröl' gomb megnyomásával kitörölheti az adatbázisból az adott GPU adatot!'</p>
        <form action="../admin/adminGPUTorol.php" method="post" style="height: auto;">
            <fieldset>
                <div class="form-group">
                    <select class="form-control" size="20" id="lista" name="lista" size="5">';
                        <?php
                        include_once "../nevekLista/adatLista.php";
                        new adatLista("gpu");
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary ml-2" name="torol" value="Töröl">
            </fieldset>
        </form>
        <?php
        if (isset($_POST["torol"])) {
            $kapcsolat = new abKapcsolat();
            $kapcsolat->torol($_POST["lista"], "gpu");
            $kapcsolat->kapcsolatZar();
            header("Location: ../admin/adminGPUTorol.php");
        }
        ?>

    </body>
</html>