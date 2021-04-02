<?php

if (isset($_POST['btreg'])) {

    include '../adatbazisKapcsolat.php';

    /* echo $fnev.", ".$datum.", ".$email.", ".$jelszo; */

    $fnev = $_POST["fnev"];
    $datum = $_POST["datum"];
    $email = $_POST["email"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    if ($jelszo == $jelszo2) {
        $jelszo = sha1($jelszo);

        $kapcsolat = new abKapcsolat();
        $felhEllenorzes = /** @lang text */
            "SELECT * FROM szadatok WHERE nev='" . $fnev . "'";
//        $felhOk = mysqli_query($kapcsolat, $felhEllenorzes);
        $felhOk = $kapcsolat->query($felhEllenorzes);
//        $felhAdat = mysqli_fetch_assoc($felhOk);
        $felhAdat = $felhOk->fetch_assoc();
        $kapcsolat->kapcsolatZar();

        if (!isset($felhAdat["nev"])) {
            $kapcsolat = new abKapcsolat();
            $emailEllenorzes = "SELECT * FROM szadatok WHERE email='" . $email . "'";
//            $emailOk = mysqli_query($kapcsolat, $emailEllenorzes);
            $emailOk = $kapcsolat->query($emailEllenorzes);
//            $adat = mysqli_fetch_assoc($emailOk);
            $adat = $emailOk->fetch_assoc();
            $kapcsolat->kapcsolatZar();
            if (!isset($adat['email'])) {
                $kapcsolat = new abKapcsolat();
                $sql = "INSERT INTO `szadatok`(`nev`, `szul_datum`, `email`, `jelszo`) VALUES (\"$fnev\",\"$datum\",\"$email\",\"$jelszo\")";
//                $lekerdezes = mysqli_query($kapcsolat, $sql)/* ;// */;
                $lekerdezes = $kapcsolat->query($sql);
                echo '<h3 style="width: 100%; margin: auto; color: green; text-align: center;">Gratulálok, sikeresen regisztráltál!</h3><br>';
//                mysqli_close($kapcsolat);
                $kapcsolat->kapcsolatZar();
            } else {
                echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Ezzel az email címmel már regisztráltak!</h3><br>';
//                mysqli_close($kapcsolat);
//                $kapcsolat->kapcsolatZar();
            }
        } else {
            echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Ez a felhasználónév már foglalt!</h3><br>';
//            mysqli_close($kapcsolat);
//            $kapcsolat->kapcsolatZar();
        }
    } else {
        echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">A két jelszó nem egyezik!</h3>';
//         mysqli_close($kapcsolat);
//        $kapcsolat->kapcsolatZar();
    }
}
   
