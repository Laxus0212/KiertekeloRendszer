<?php
//nem lehet közvetlenül az oldalra lépni, először be kell jelentkezni
session_start();
if (!isset($_SESSION["adminLoggedIn"])) {
    header("Location: ../belepes/belepes.php");
}
