<?php
require_once __DIR__."/adatbazisKapcsolat.php";
$kapcsolat = new abKapcsolat();
$kapcsolat->kapcsolodas();

if (isset($_POST["cpu"]) && isset($_POST["CPUbenchmark"]) && isset($_POST["CPUlink"]) && isset($_POST["CPUar"])) {
    if (!empty($_POST["cpu"]) && !empty($_POST["CPUbenchmark"]) && !empty($_POST["CPUlink"]) && !empty($_POST["CPUar"])) {

        $nev = $_POST["cpu"];
        $bench = $_POST["CPUbenchmark"];
        $link = $_POST["CPUlink"];
        $ar = $_POST["CPUar"];
        if ($kapcsolat->hanyAdatVan("nev=\"$nev\"", "cpu") == 0) {
            //INSERT INTO `cpu`(`id`, `nev`, `benchmark`) VALUES ([value-1],[value-2],[value-3])
            $sql = "INSERT INTO cpu (nev, benchmark, link, ar) VALUES (\"$nev\",$bench,\"$link\",$ar)";
            //echo $sql;

            $kapcsolat->query($sql);
            echo "<h2>CPU -> Sikeres adatfeltöltés!</h2>";
        } else {
            echo "<h2>CPU -> Már van ilyen adat az adatbázisban!</h2>";
        }

    } else {
        echo "<h2>Valamelyik adat nem lett kitöltve a CPU-ra vonatkozóan!</h2>";
    }
} else {
    echo "<h2>A CPU-ra vonatkozó adat nem lett elküldve!</h2>";
}
if (isset($_POST["gpu"]) && isset($_POST["GPUbenchmark"]) && isset($_POST["GPUlink"]) && isset($_POST["GPUar"])) {
    if (!empty($_POST["gpu"]) && !empty($_POST["GPUbenchmark"]) && !empty($_POST["GPUlink"]) && !empty($_POST["GPUar"])) {
        $nev = $_POST["gpu"];
        $bench = $_POST["GPUbenchmark"];
        $link = $_POST["GPUlink"];
        $ar = $_POST["GPUar"];
        if ($kapcsolat->hanyAdatVan("nev=\"$nev\"", "gpu") == 0) {
            //INSERT INTO `cpu`(`id`, `nev`, `benchmark`) VALUES ([value-1],[value-2],[value-3])
            $sql = "INSERT INTO gpu (nev, benchmark, link, ar) VALUES (\"$nev\",$bench,\"$link\",$ar)";
            //echo $sql;
            $kapcsolat->query($sql);
            echo "<h2>GPU -> Sikeres adatfeltöltés!</h2>";
        } else {
            echo "<h2>GPU -> Már van ilyen adat az adatbázisban!</h2>";
        }

    } else {
        echo "<h2>Valamelyik adat nem lett kitöltve a GPU-ra vonatkozóan!</h2>";
    }
} else {
    echo "<h2>A GPU-ra vonatkozó adat nem lett elküldve!</h2>";
}
if (isset($_POST["ram"]) && isset($_POST["RAMbenchmark"]) && isset($_POST["RAMlink"]) && isset($_POST["RAMar"])) {
    if (!empty($_POST["ram"]) && !empty($_POST["RAMbenchmark"]) && !empty($_POST["RAMlink"]) && !empty($_POST["RAMar"])) {

        $nev = $_POST["ram"];
        $bench = $_POST["RAMbenchmark"];
        $link = $_POST["RAMlink"];
        $ar = $_POST["RAMar"];
        if ($kapcsolat->hanyAdatVan("nev=\"$nev\"", "ram") == 0) {
            //INSERT INTO `cpu`(`id`, `nev`, `benchmark`) VALUES ([value-1],[value-2],[value-3])
            $sql = "INSERT INTO ram (nev, benchmark, link, ar) VALUES (\"$nev\",$bench,\"$link\",$ar)";
            //echo $sql;
            $kapcsolat->query($sql);
            echo "<h2>RAM -> Sikeres adatfeltöltés!</h2>";
        } else {
            echo "<h2>RAM -> Már van ilyen adat az adatbázisban!</h2>";
        }

    } else {
        echo "<h2>Valamelyik adat nem lett kitöltve a RAM-ra vonatkozóan!</h2>";
    }
} else {
    echo "<h2>A RAM-ra vonatkozó adat nem lett elküldve!</h2>";
}
$kapcsolat->kapcsolatZar();