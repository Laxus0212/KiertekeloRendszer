<?php

        $host = "localhost";
        $ab_nev = "root";
        $ab_jelszo = "";
        $abnev = "regisztraciosadatok";
        
        $kapcsolat = mysqli_connect($host, $ab_nev, $ab_jelszo, $abnev) or die("Hiba a kapcsolat létrehozásakor!");
   

// $host = "tanulo20.szf1b.oktatas.szamalk-szalezi.hu";
// $ab_nev = "c1_tanulo20szf1b";
// $ab_jelszo = "_tanulo20szf1b";
// $abnev = "c1ABtanulo20szf1b";

//class abKapcsolat {
//
//    function __construct() {
////        $host = "localhost";
////        $ab_nev = "root";
////        $ab_jelszo = "";
////        $abnev = "regisztraciosadatok";
////        $kapcsolat = mysqli_connect($host, $ab_nev, $ab_jelszo, $abnev) or die("Hiba a kapcsolat létrehozásakor!");
//        define("HOST", "localhost");
//        define("FNEV", "root");
//        define("JSZ", "");
//        define("ABNEV", "regisztraciosadatok");
//
//        $kapcsolat = new mysqli(HOST, FNEV, JSZ, ABNEV) or die("Hiba a kapcsolat létrehozásakor!");
//
//        $kapcsolat->query("set name utf8");
//        $kapcsolat->query("set character set utf8");
//        $kapcsolat->query("set collation_connection='utf8_hungary_ci");
//    }
//
//    public function kapcsolatZar() {
//        $kapcsolat->close();
//    }
//    
////    function torol($nev, $honnan) {
////        include '../adatbazisKapcsolat.php';
////        //DELETE FROM `adatok` WHERE 0
////        $kapcsolat = new abKapcsolat();
////        $lekerdezes = mysqli_query($kapcsolat, "DELETE FROM $honnan WHERE nev='$nev'");
////        $kapcsolat->kapcsolatZar();
//////        var_dump($honnan + " " + $nev);
////        
////    }
//    
//    
//
//}
