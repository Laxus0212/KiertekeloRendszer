<?php
if (isset($_POST["ertekeles"])) {
    if (!empty($_POST["felhCPU"])) {
        include_once "../adatbazisKapcsolat.php";
        $cpu = $_POST["felhCPU"];
        $gpu = $_POST["felhGPU"];
        $ram = $_POST["felhRAM"];

        $kapcsolat = new abKapcsolat();
        $kapcsolat->kapcsolodas();
        $cpuSql = /** @lang text */
            "SELECT * FROM cpu WHERE nev=\"" . $cpu . "\"";
        $gpuSql = /** @lang text */
            "SELECT * FROM gpu WHERE nev=\"" . $gpu . "\"";
        $ramSql =
            /** @lang text */
            "SELECT * FROM ram WHERE nev=\"" . $ram . "\"";
        $gpuErtek = "";
        $gpuLink = "";
        $gpuAr = 0;
        $cpuErtek = "";
        $cpuLink = "";
        $cpuAr = 0;
        $ramErtek = "";
        $ramLink = "";
        $ramAr = 0;
        if ($kapcsolat->hanyAdatVan("nev=\"$cpu\"", "cpu") > 0) {

            $tomb = $kapcsolat->query($cpuSql)->fetch_assoc();
            $cpuErtek = $tomb["benchmark"];
            $cpuLink = $tomb["link"];
            $cpuAr = $tomb["ar"];
            //echo $cpuErtek."<br>";
            //echo $cpuSql;
        }
        if ($kapcsolat->hanyAdatVan("nev=\"$gpu\"", "gpu") > 0) {
            $tomb = $kapcsolat->query($gpuSql)->fetch_assoc();
            $gpuErtek = $tomb["benchmark"];
            $gpuLink = $tomb["link"];
            $gpuAr = $tomb["ar"];
            //echo $gpuErtek."<br>";
            //echo $gpuSql;
        }
        if ($kapcsolat->hanyAdatVan("nev=\"$ram\"", "ram") > 0) {
            $tomb = $kapcsolat->query($ramSql)->fetch_assoc();
            $ramErtek = $tomb["memoria"];
            $ramLink = $tomb["link"];
            $ramAr = $tomb["ar"];
            //echo $ramErtek;
            //echo $ramSql;
        }
        switch ($ramErtek) {
            case 2:
                $ramErtek = 1;
                break;
            case 4:
                $ramErtek = 2;
                break;
            case 6:
                $ramErtek = 3;
                break;
            default:
                $ramErtek = 4;
                break;

        }
        $vegOsszeg = $gpuAr + $cpuAr + $ramAr;
        $kiir = "<table class=\"table\" style='margin-top: 10px;'>
    <thead class=\"thead-light\">
      <tr>
        <th scope='col'>Név</th>
        <th scope='col'>Minősítés (1:Rossz - 4:Kiváló)</th>
        <th scope='col'>Link</th>
        <th scope='col'>Ár (Ft)</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>" . $cpu . "</td>
        <td>" . $cpuErtek . "</td>
        <td>" . $cpuLink . "</td>
        <td>" . $cpuAr . "</td>
      </tr>
      <tr>
        <td>" . $gpu . "</td>
        <td>" . $gpuErtek . "</td>
        <td>" . $gpuLink . "</td>
        <td>" . $gpuAr . "</td>
      </tr>
      <tr>
        <td>" . $ram . "</td>
        <td>" . $ramErtek . "</td>
        <td>" . $ramLink . "</td>
        <td>" . $ramAr . "</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Összesen: $vegOsszeg</td>
      </tr>
    </tbody>
  </table>";
        echo $kiir;
        $kapcsolat->kapcsolatZar();

    }
}