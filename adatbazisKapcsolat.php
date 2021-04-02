<?php

//        $host = "localhost";
//        $ab_nev = "root";
//        $ab_jelszo = "";
//        $abnev = "regisztraciosadatok";
//        
//        $kapcsolat = mysqli_connect($host, $ab_nev, $ab_jelszo, $abnev) or die("Hiba a kapcsolat létrehozásakor!");


// $host = "tanulo20.szf1b.oktatas.szamalk-szalezi.hu";
// $ab_nev = "c1_tanulo20szf1b";
// $ab_jelszo = "_tanulo20szf1b";
// $abnev = "c1ABtanulo20szf1b";

class abKapcsolat
{
    function kapcsolodas()
    {
        /*$host = "tanulo20.szf1b.oktatas.szamalk-szalezi.hu";
        $fnev = "c1_tanulo20szf1b";
        $jsz = "_tanulo20szf1b";
        $abnev = "c1ABtanulo20szf1b";*/

        $host = "localhost";
        $fnev = "root";
        $jsz = "";
        $abnev = "regisztraciosadatok";

        $kapcsolat = new mysqli($host, $fnev, $jsz, $abnev) or die("Hiba a kapcsolat létrehozásakor!");

        $kapcsolat->query("set name utf8");
        $kapcsolat->query("set character set utf8");
        $kapcsolat->query("set collation_connection='utf8_hungary_ci");
        return $kapcsolat;
    }

    public function kapcsolatZar()
    {
        $this->kapcsolodas()->close();
    }

    function torol($nev, $honnan)
    {
        $sql = "DELETE FROM " . $honnan . " WHERE nev=\"" . $nev . "\"";
        mysqli_query($this->kapcsolodas(), $sql);
        $this->kapcsolatZar();
    }

    function query($sql)
    {
        //$this->query($sql);
        return $this->kapcsolodas()->query($sql);
        //mysqli_query($this,$sql);
    }



    /**
     * @param $feltetel
     * @param $hol
     * @return int
     */
    function hanyAdatVan($feltetel, $hol)
    {
        $sql = "SELECT * FROM " . $hol . " WHERE " . $feltetel;
        $eredmeny = $this->query($sql);
        return $eredmeny->num_rows;
    }

    function adatFrissit($tabla, $ertekek, $feltetel = 1)
    {
        $sql = "UPDATE $tabla SET $ertekek WHERE $feltetel";
        if ($this->query($sql)) {
            echo "<h3>Sikeres adatmódosítás!</h3>";
        } else {
            echo "<h3>Sikertelen adatmódosítás!</h3> ". $sql;
        }
    }


}
