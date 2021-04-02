<?php
if (isset($_POST["regiJelszo"]) && isset($_POST["ujJelszo"])) {
    include_once "../adatbazisKapcsolat.php";
    $kapcsolat = new abKapcsolat();
    $kapcsolat->kapcsolodas();
    $regiJelszo = sha1($_POST["regiJelszo"]);
    $ujJelszo = sha1($_POST["ujJelszo"]);
    $hanyAdatVan = $kapcsolat->hanyAdatVan("jelszo=\"$regiJelszo\"", "szadatok");
    if ($hanyAdatVan > 0) {
        $felhNev = $_SESSION['felh_nev'];
        $kapcsolat->adatFrissit("szadatok", "jelszo=\"$ujJelszo\"", "jelszo=\"$regiJelszo\" AND nev=\"$felhNev\"");
    }else{
        echo "<h3>Helytelen jelszó!</h3>";
    }

}