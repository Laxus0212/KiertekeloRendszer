<?php


class AdatFrissites
{
    function __construct()
    {
        require_once __DIR__ . "/adatbazisKapcsolat.php";
    }
    function jogFrissit()
    {
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
    }

    function jelszoFrissit()
    {
        //nincs szükség szöveg vizsgálatra mert titkosítás után kerül sql parancsba
        if (isset($_POST["regiJelszo"]) && isset($_POST["ujJelszo"])) {
            $kapcsolat = new abKapcsolat();
            $kapcsolat->kapcsolodas();
            $regiJelszo = sha1($_POST["regiJelszo"]);
            $ujJelszo = sha1($_POST["ujJelszo"]);
            $hanyAdatVan = $kapcsolat->hanyAdatVan("jelszo=\"$regiJelszo\"", "szadatok");
            if ($hanyAdatVan > 0) {
                $felhNev = $_SESSION['felh_nev'];
                $kapcsolat->adatFrissit("szadatok", "jelszo=\"$ujJelszo\"", "jelszo=\"$regiJelszo\" AND nev=\"$felhNev\"");
            } else {
                echo "<h3>Helytelen jelszó!</h3>";
            }

        }
    }
}