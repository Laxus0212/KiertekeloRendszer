<?php


class Reglog
{

    function regFeldolgozas()
    {
        include "../adatbazisKapcsolat.php";
        if (isset($_POST['btreg'])) {
            /* echo $fnev.", ".$datum.", ".$email.", ".$jelszo; */
            //regisztrációs adatok feldolgozása
            $fnev = trim($_POST["fnev"]);
            $datum = $_POST["datum"];
            $email = trim($_POST["email"]);
            $jelszo = trim($_POST["jelszo"]);
            $jelszo2 = trim($_POST["jelszo2"]);
            if (!empty($fnev) && !empty($jelszo)){
            if ($jelszo == $jelszo2) {
                $jelszo = sha1($jelszo);
                    $kapcsolat = new abKapcsolat();
                $felhEllenorzes = /** @lang text */
                    "SELECT * FROM szadatok WHERE nev='" . $fnev . "'";
                $felhOk = $kapcsolat->query($felhEllenorzes);
                $felhAdat = $felhOk->fetch_assoc();
                $kapcsolat->kapcsolatZar();
                if (!isset($felhAdat["nev"])) {
                    $kapcsolat = new abKapcsolat();
                    $emailEllenorzes = "SELECT * FROM szadatok WHERE email='" . $email . "'";
                    $emailOk = $kapcsolat->query($emailEllenorzes);
                    $adat = $emailOk->fetch_assoc();
                    $kapcsolat->kapcsolatZar();
                    if (!isset($adat['email'])) {
                        $kapcsolat = new abKapcsolat();
                        $sql = "INSERT INTO `szadatok`(`nev`, `szul_datum`, `email`, `jelszo`) VALUES (\"$fnev\",\"$datum\",\"$email\",\"$jelszo\")";
                        $lekerdezes = $kapcsolat->query($sql);
                        echo '<h3 style="width: 100%; margin: auto; color: green; text-align: center;">Gratulálok, sikeresen regisztráltál!</h3><br>';
                        $kapcsolat->kapcsolatZar();
                    } else {
                        echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Ezzel az email címmel már regisztráltak!</h3><br>';
                    }
                } else {
                    echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Ez a felhasználónév már foglalt!</h3><br>';
                }
            } else {
                echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">A két jelszó nem egyezik!</h3>';
            }
            }else{
                echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">A felhasználónév és/vagy jelszó nem állhat szóközből!</h3>';
            }
        }
    }

    function logFeldolgozas()
    {
        session_start();
        session_unset();
        include "../adatbazisKapcsolat.php";
        if (isset($_POST["btlog"])) {
            //beírt adatok feldolgozása
            $felh_nev = trim($_POST["fnev"]);
            $jelszo = trim($_POST["jelszo"]);
            $jelszo = sha1($jelszo);
            $admin = null;
            $kapcsolat = new abKapcsolat();
            $sql = "SELECT nev, jelszo, admin FROM szadatok WHERE nev ='" . $felh_nev . "' AND jelszo = '" . $jelszo . "'";
            $lekerdezes = $kapcsolat->query($sql);
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
            } else {
                // helyes felhasználónév és jelszó megadásakor jogosultságnak megfelelő SESSION létrehozása és felhasználó megfelelő feületre való irányítása
                if ($felh_nev == $letezik_nev && $jelszo == $letezik_jelszo) {
                    $_SESSION["felh_nev"] = $felh_nev;
                    $_SESSION["loggedin"] = true;
                     //ide irányít, ha sikeres a login.
                    if ($admin == 2) {
                        $_SESSION["adminLoggedIn"] = true;
                        $_SESSION["szuperAdminLoggedIn"] = true;
                        header("Location: ../admin/adminAdatFeltolt.php");
                    } elseif ($admin == 1) {
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
    }
}