<?php
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->AddPage();

$txt = <<<EOD
<div style="border:2px solid #004A21; width:615px; text-align:center;">
  <img src="IMAGEN" alt=""><br>
  <div>
  Comprobante Inscripción de taller Colegio salesiano El Patrocino de San José 2016

  </div>
  <div>
<strong> Datos de Inscripción</strong>
</div>

  

   
  <div style="text-align:center;">
   <table border="1" width="516" cellspacing="0" bordercolor="black" cellpadding="5" align="center">



        <tbody><tr><th>N° inscripcion</th><td> VID </td></tr>
        <tr><th>RUT</th><td> VRUT </td></tr>
          <tr><th>Nombre</th><td> VNOMBRE </td></tr>
          <tr><th>Curso</th><td> VCURSO </td></tr>
          <tr><th>Taller</th><td> VTALLER </td></tr>
          <tr><th>Estado</th><td> VESTADO </td></tr>
          <tr><th>Fecha Toma</th><td> VFECHA </td></tr>
  </tbody></table>
  </div>
      
  <div>
    *Te recomendamos guardar este comprobante
    <img width="30" height="30" src="http://cole.local/assets/img/check.png" alt="">
  </div>

</div>
EOD;


$txt =str_replace("VID",base64_decode($_GET["I"]),$txt);
$txt =str_replace("VRUT",base64_decode($_GET["R"]),$txt);
$txt =str_replace("VNOMBRE",base64_decode($_GET["N"]),$txt);
$txt =str_replace("VCURSO",base64_decode($_GET["C"]),$txt);
$txt =str_replace("VTALLER",base64_decode($_GET["T"]),$txt);
$txt =str_replace("VESTADO",base64_decode($_GET["E"]),$txt);
$txt =str_replace("VFECHA",base64_decode($_GET["F"]),$txt);
$txt =str_replace("IMAGEN",base64_decode($_GET["IM"]),$txt);

//http://localhost/PDF/examples/example_002.php?I=7237&R=17420667&N=SEBASTIAN ALVAREZ&C=OTCAVO BASICO A&T=ESCULTURA&E=INSCRITO&F=17/17/2016
/*VRUT
VNOMBRE
VCURSO
VTALLER
VESTADO
VFECHA*/

// print a block of text using Write()
$pdf->writeHTML($txt, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('CertificadoInscripcion.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
