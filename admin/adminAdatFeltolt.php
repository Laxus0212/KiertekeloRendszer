<?php
include '../felhasznalo.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kezdőlap</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <?php
        echo '<div class="card bg-dark text-white">
    <div class="card-body"> Üdv ' . $_SESSION['felh_nev'] . '!</div>
  </div>';
        ?>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="../admin/adminAdatFeltolt.php">Adatfelvitel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="../admin/adminFelhTorol.php">Felhasználó törlés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="../admin/adminProcTorol.php">CPU törlés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="../admin/adminGPUTorol.php">GPU törlés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="../admin/adminRAMTorol.php">RAM törlés</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="../belepes/belepes.php">Kilépés</a>
                </li>
            </ul>
        </nav>

        
        <form action="adminAdatFeltolt.php">
        
        <div class="form-group ml-2">
            <label for="cpu">CPU:</label>
            <input type="text" class="form-control w-50" id="cpu" name="cpu">
        </div>
        <div class="form-group ml-2">
            <label for="gpu">GPU:</label>
            <input type="text" class="form-control w-50" id="gpu" name="gpu">
        </div>
        <div class="form-group ml-2">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control w-50" id="ram" name="ram">
        </div>
        
      
        <button type="submit" class="btn btn-primary" name="sub" style="margin-left: 22.5%;">Feltölt</button>
        </form>
        



    </body>
</html>