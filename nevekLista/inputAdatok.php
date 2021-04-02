<?php


class inputAdatok
{
    function __construct($bench)
    {

        include_once "../nevekLista/adatLista.php";
        //var_dump(new adatLista("cpu", "benchmark=1"));
        $feltetel = "benchmark=" . $bench;

        echo ' <label for="felhCPU">CPU:</label>
    <select id="felhCPU" name="felhCPU" class="custom-select mb-3">';


        new adatLista("cpu", $feltetel);

        echo ' </select>
    <label for="felhGPU">GPU:</label>
    <select id="felhGPU" name="felhGPU" class="custom-select mb-3">';

        //echo 'include_once "../nevekLista/adatLista.php"';
        new adatLista("gpu", $feltetel);

        echo ' </select>
    <label for="felhRAM">RAM:</label>
    <select id="felhRAM" name="felhRAM" class="custom-select mb-3">';

        //echo 'include_once "../nevekLista/adatLista.php"';
        new adatLista("ram");

        echo ' </select>
   ';
    }
}
