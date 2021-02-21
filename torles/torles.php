<?php


class Torles {

    function torol($nev, $honnan) {
        include '../adatbazisKapcsolat.php';
        //DELETE FROM `adatok` WHERE 0
        $lekerdezes = mysqli_query($kapcsolat, "DELETE FROM $honnan WHERE nev='$nev'");
//        var_dump($honnan + " " + $nev);
        
    }
//    function torol($nev, $honnan) {
//        include '../adatbazisKapcsolat.php';
//        //DELETE FROM `adatok` WHERE 0
//        $kapcsolat = new abKapcsolat();
//        $lekerdezes = mysqli_query($kapcsolat, "DELETE FROM $honnan WHERE nev='$nev'");
//        $kapcsolat->kapcsolatZar();
////        var_dump($honnan + " " + $nev);
//        
//    }

}


?>
