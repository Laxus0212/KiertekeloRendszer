<?php
include_once "../adatbazisKapcsolat.php";
$kapcsolat = new abKapcsolat();
$kapcsolat->kapcsolodas();

if (isset($_POST["felhJog"]) && isset($_POST["jog1"])) {
    $nev = $_POST["jog1"];
    $kapcsolat->adatFrissit("szadatok", "admin=1", "nev=\"$nev\"");
}
if (isset($_POST["adminJog"]) && isset($_POST["jog2"])) {
    $nev = $_POST["jog2"];
    $kapcsolat->adatFrissit("szadatok", "admin=0", "nev=\"$nev\"");
}
$kapcsolat->kapcsolatZar();