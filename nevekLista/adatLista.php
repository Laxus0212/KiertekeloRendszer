<?php


class adatLista
{
 function __construct($honnan,$feltetel="")
 {
     include_once '../adatbazisKapcsolat.php';
     $kapcsolat = new abKapcsolat();
     if ($feltetel==""){
         $sql = "SELECT nev FROM ".$honnan;
     }else{
         $sql = "SELECT nev FROM ".$honnan." WHERE ".$feltetel;
     }

     $lekerdezes = $kapcsolat->query($sql);
    while ($sorok = $lekerdezes->fetch_assoc()){
        if (isset($sorok)){
            foreach ($sorok as $sor){
                echo "<option>".$sor."</option>";
            }
        }

    }
    $kapcsolat->kapcsolatZar();
 }

}