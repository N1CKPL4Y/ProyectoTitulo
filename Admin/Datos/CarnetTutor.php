<?php

include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
//echo $rut;

$query = "SELECT * FROM `tutor` WHERE rut = '$rut';";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['RUT'];
    $nom = $row['nombre'];
    $contenido = $row['c_identidad'];
    $tipo = 'image/jpg';
}
//header("Content-Type: $tipo");
//echo $contenido;
require '../../fpdf/fpdf.php';

$dataUrl = "data:image/jpeg;base64," . base64_encode($contenido) . "";
$img = explode(',', $dataUrl, 2)[1];
$pic = 'data://text/plain;base64,' . $img;

class PDF_ViewPref extends FPDF {

    protected $DisplayPreferences = '';

    function DisplayPreferences($preferences) {
        $this->DisplayPreferences = $preferences;
    }

    function _putcatalog() {
        parent::_putcatalog();
        if (is_int(strpos($this->DisplayPreferences, 'FullScreen')))
            $this->_put('/PageMode /FullScreen');
        if ($this->DisplayPreferences) {
            $this->_put('/ViewerPreferences<<');
            if (is_int(strpos($this->DisplayPreferences, 'HideMenubar')))
                $this->_put('/HideMenubar true');
            if (is_int(strpos($this->DisplayPreferences, 'HideToolbar')))
                $this->_put('/HideToolbar true');
            if (is_int(strpos($this->DisplayPreferences, 'HideWindowUI')))
                $this->_put('/HideWindowUI true');
            if (is_int(strpos($this->DisplayPreferences, 'DisplayDocTitle')))
                $this->_put('/DisplayDocTitle true');
            if (is_int(strpos($this->DisplayPreferences, 'CenterWindow')))
                $this->_put('/CenterWindow true');
            if (is_int(strpos($this->DisplayPreferences, 'FitWindow')))
                $this->_put('/FitWindow true');
            $this->_put('>>');
        }
    }

}

$pdf = new FPDF();
$pdf->AddPage('P', 'Legal');
$pdf->SetTitle("Copia Carnet Tutor");
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetXY(70, 10);
$pdf->Cell(60, 7, 'Copia Cedula de identidad');
$pdf->Ln(20);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(180, 6, utf8_decode('Se presenta la copia de la cedula de identidad de: ' . $rut . ' correspondiente a Don: ' . $nom));
$pdf->Ln();
$pdf->Image($pic, 20, 50, 130, 80, 'jpg');
$pdf->Output('Contrato.pdf', 'I');
echo "<script language='javascript'>function disableIE() {
    if (document.all) {
        return false;
    }
}
function disableNS(e) {
    if (document.layers || (document.getElementById && !document.all)) {
        if (e.which==2 || e.which==3) {
            return false;
        }
    }
}
if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = disableNS;
} 
else {
    document.onmouseup = disableNS;
    document.oncontextmenu = disableIE;
}
document.oncontextmenu=new Function('return false');window.open('Contrato.pdf#toolbar=0','_blank','')';</script>";

?>



