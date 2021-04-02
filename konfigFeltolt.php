<?php
//ellőrzi, hogy van e ilyen konfig az adatbázisba
//ha van update
//ha nincs feltölt
require_once __DIR__."/adatbazisKapcsolat.php";
if (isset($_POST["PDF"])) {
    $pdfCpu = $_POST["felhCPU"];
    $pdfGpu = $_POST["felhGPU"];
    $pdfRam = $_POST["felhRAM"];

    $sql = "SELECT * FROM tarolt_konfiguraciok WHERE CPU=\"$pdfCpu\" AND GPU=\"$pdfGpu\" AND RAM=\"$pdfRam\"";
    $kapcsolat = new abKapcsolat();
    $lekerdezes = $kapcsolat->query($sql);
    if ($lekerdezes->num_rows > 0) {
        $sor = $lekerdezes->fetch_assoc();
        $db = $sor["db"] + 1;
        $frissit = "UPDATE tarolt_konfiguraciok SET db=$db WHERE CPU=\"$pdfCpu\" AND GPU=\"$pdfGpu\" AND RAM=\"$pdfRam\"";
        $kapcsolat->query($frissit);

    } else {
        $feltolt = "INSERT INTO tarolt_konfiguraciok (CPU,GPU,RAM) VALUES(\"$pdfCpu\",\"$pdfGpu\",\"$pdfRam\")";
        $kapcsolat->query($feltolt);

    }
}
