<?php
//nem lehet közvetlenül az oldalra lépni, először be kell jelentkezni
session_start();
if (!isset($_SESSION["felh_nev"]) && $_SESSION["loggedin"] !== true) {
    header("Location: ../belepes/belepes.php");
}
?>


