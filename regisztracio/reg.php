
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


        $felhEllenorzes = "SELECT * FROM SZadatok WHERE nev='$fnev'";
        $felhOk = mysqli_query($kapcsolat, $felhEllenorzes);
        $felhAdat = mysqli_fetch_assoc($felhOk);

        if (!isset($felhAdat["nev"])) {
            $emailEllenorzes = "SELECT * FROM SZadatok WHERE email='$email'";
            $emailOk = mysqli_query($kapcsolat, $emailEllenorzes);
            $adat = mysqli_fetch_assoc($emailOk);
            if (!isset($adat['email'])) {
                $sql = "INSERT INTO `SZadatok`(`nev`, `szul_datum`, `email`, `jelszo`) VALUES (\"$fnev\",\"$datum\",\"$email\",\"$jelszo\")";
                $lekerdezes = mysqli_query($kapcsolat, $sql)/* ;// */;
                echo '<h3 style="width: 100%; margin: auto; color: green; text-align: center;">Gratulálok, sikeresen regisztráltál!</h3><br>';
                mysqli_close($kapcsolat);
            } else {
                echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Ezzel az email címmel már regisztráltak!</h3><br>';
                mysqli_close($kapcsolat);
            }
        }else{
            echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">Ez a felhasználónév már foglalt!</h3><br>';
            mysqli_close($kapcsolat);
        }
    } else {
        echo '<h3 style="border: 1px solid red; width: 100%; margin: auto; background-color: red; color: black; text-align: center;">A két jelszó nem egyezik!</h3>';
         mysqli_close($kapcsolat);
    }
}
?>
   
