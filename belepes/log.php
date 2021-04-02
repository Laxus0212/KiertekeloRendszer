<?php

session_start();
session_unset();
if (isset($_POST["btlog"])) {
    include('../adatbazisKapcsolat.php');
    $felh_nev = trim($_POST["fnev"]);
    $jelszo = trim($_POST["jelszo"]);
    $jelszo = sha1($jelszo);
    $admin = null;


    $kapcsolat = new abKapcsolat();
    $sql = "SELECT nev, jelszo, admin FROM szadatok WHERE nev ='" . $felh_nev . "' AND jelszo = '" . $jelszo . "'";
//    $lekerdezes = mysqli_query($kapcsolat, "SELECT nev, jelszo, admin FROM SZadatok WHERE nev ='$felh_nev' AND jelszo = '$jelszo'");
    $lekerdezes = $kapcsolat->query($sql);
//    $adat = mysqli_fetch_assoc($lekerdezes); //($lekerdezes);
    $adat = $lekerdezes->fetch_array();
    $kapcsolat->kapcsolatZar();
    if (isset($adat["nev"])) {
        $letezik_nev = $adat["nev"];
        $letezik_jelszo = $adat["jelszo"];
        $admin = $adat["admin"];
    } else {
        $letezik_nev = "";
        $letezik_jelszo = "";
    }
    $kapcsolat->kapcsolatZar();

    if ($letezik_nev == "") {

        echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black;  text-align: center;">Rossz felhasználónév vagy jelszó!</h3>';

        //require './belepes.php';
    } else {
        if ($felh_nev == $letezik_nev && $jelszo == $letezik_jelszo) {
            $_SESSION["felh_nev"] = $felh_nev;
            $_SESSION["loggedin"] = true;
            //$_SESSION["adminLoggedIn"] = false;
            //header('Location: felhasznalo.php'); //ide irányít, ha sikeres a login.
            if ($admin == 2) {
                $_SESSION["adminLoggedIn"] = true;
                $_SESSION["szuperAdminLoggedIn"] = true;
                header("Location: ../admin/adminAdatFeltolt.php");
            } elseif ($admin == '1' || $admin == 1 || $adat["admin"] == 1) {
                $_SESSION["adminLoggedIn"] = true;
                header('Location: ../admin/adminAdatFeltolt.php');
            } else {
                header('Location: ../felhasznaloiOldal/Kezdolap.php');
            }
        } else {
            echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Rossz felhasználónév vagy jelszó!</h3>';
        }
    }
}

