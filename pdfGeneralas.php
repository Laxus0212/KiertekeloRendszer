<?php
include_once __DIR__ . "/tfpdf/tfpdf.php";
include_once __DIR__."/konfigFeltolt.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST["PDF"])) {
    pdfFelhasznalonak();
}
if (isset($_POST["adminPDF"])) {
    pdfAdminnak();
}
function generalas($fejlec, $tartalom)
{
    define("_SYSTEM_TTFONTS", "../font");



    $pdf = new tFPDF();
    //$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
    //$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    //$pdf->SetFont('DejaVu','',14);
//PDF lap generálása és tájolása + margin beállítása
    //$pdf = new tFPDF();
    $pdf->SetMargins(50, 20);
    $pdf->AddPage("2", "", 0);
// Kódolás UTF-8-ra
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);
    $pdf->SetFont('DejaVu','',14);
//Kiiratás
// Header
// Cím
    $pdf->SetTitle("Konfiguráció", true);
    $pdf->Cell(200, 10, 'Konfiguráció', 0, 0, 'C');
    $pdf->Ln(20);
//Adat táblába írása
    foreach ($tartalom as $row) {
        for ($i = 0; $i < count($fejlec); $i++) {
            $pdf->SetFillColor(128, 128, 128);
            $pdf->SetTextColor(0);
            //$pdf->SetDrawColor(128,0,0);
            $pdf->Cell(200, 7, $fejlec[$i], 1, 0, 'C', true);
            $pdf->Ln();
            $pdf->SetFillColor(224, 235, 255);
            $pdf->SetTextColor(0);
            $pdf->Cell(200, 7, $row[$i], 1, 0, 'C', true);
            $pdf->Ln();
        }
        $pdf->Ln();
    }
    // Kimenet
    $pdf->Output("I", "Konfiguracio", true);
}

//Ha felhasználó felől jön adat
function pdfFelhasznalonak()
{
    $pdfCpu = $_POST["felhCPU"];
    $pdfGpu = $_POST["felhGPU"];
    $pdfRam = $_POST["felhRAM"];

    $haszontalanTomb = array();
    array_push($haszontalanTomb, $pdfCpu, $pdfGpu, $pdfRam);

    $fejlec = array();
    $tartalom = array();

    array_push($fejlec, "CPU");
    array_push($fejlec, "GPU");
    array_push($fejlec, "RAM");

    array_push($tartalom, $haszontalanTomb);

    generalas($fejlec, $tartalom);
}

//Ha admin felől jön adat
function pdfAdminnak()
{
    require_once "./adatbazisKapcsolat.php";
    $fejlec = array();
    array_push($fejlec, "CPU");
    array_push($fejlec, "GPU");
    array_push($fejlec, "RAM");
    array_push($fejlec, "HÁNYSZOR");

    $sql = "SELECT * FROM tarolt_konfiguraciok";
    $kapcsolat = new abKapcsolat();
    $lekerdezes = $kapcsolat->query($sql);
    $tartalom = array();
    //var_dump($lekerdezes);
    if ($lekerdezes->num_rows > 0) {
        while ($sor = $lekerdezes->fetch_row()) {
            $tartalom[] = $sor;
            //array_push($tartalom,$sor);
        }
//array rendezése db alapján(db értéket kulcsá tesszük és az szerint rendezzük az eredeti array-t)
        foreach ($tartalom as $kulcs => $ertek) {
            $ertekbolKulcs[$kulcs] = $ertek[3];
        }
        array_multisort($ertekbolKulcs, SORT_DESC, $tartalom);
        generalas($fejlec, $tartalom);
    }
}