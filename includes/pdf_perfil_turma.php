<?php
require('fpdf.php');
require("connect.php");
require("result.php");
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   $this->Image('logo2.png' , 146 ,0, 48 , 30,'png');
   $this->Image('logo_edu.png' ,12 ,2, 38 , 22,'png');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Line break
    $this->Ln(15);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-12);
    // Arial italic 8
    $this->SetFont('Arial','I',7);
    // Page number
    $this->SetDrawColor(2,119,209);
    $this->SetLineWidth(1);
    $this->Line(10,282,200,282);
    $this->SetTextColor(2,119,209);
    $foot1 ="CENTRO DE FORMAÇÃO DE ASSOCIAÇÃO DE ESCOLAS DO LITORAL À SERRA – Escolas dos concelhos de Loulé e S. Brás de Alportel";
    $foot1 = stripslashes($foot1);
    $foot1 = iconv('UTF-8', 'windows-1252', $foot1);
    $foot2  ="Avenida Laginha Serafim, 8100-740 Loulé – Tel.289 414 421 Fax: 289 412 736 E-mail: cfploule@es-loule.edu.pt";
    $foot2 = stripslashes($foot2);
    $foot2 = iconv('UTF-8', 'windows-1252', $foot2);
    $foot3 = "URL: http://www.es-loule.edu.pt/cfp/moodle/";
    $foot3 = stripslashes($foot3);
    $foot3 = iconv('UTF-8', 'windows-1252', $foot3);


    $this->Cell(0,0,$foot1,0,0,'C');
    $this->Ln(3);
    $this->Cell(0,0,$foot2,0,0,'C');
    $this->Ln(3);
    $this->Cell(0,0,$foot3,0,0,'C');
}
}

$id_turma=$_GET['id_turma'];
$hora="3 da tarde";
$local="faro";
$id_edicao=mysqli_query(con(),"SELECT * FROM turma WHERE '$id_turma'=id_turma GROUP BY id_turma");
$id_edicao=mysqli_result($id_edicao,0,'id_edicao_formacao');
$registo_acao=mysqli_query(con(),"SELECT * FROM edicao_formacao WHERE '$id_edicao'=id_edicao");
$id_acao=mysqli_result($registo_acao,0,'id_acao_formacao');
$acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE '$id_acao'=id_acao_formacao");
$nome=mysqli_result($acao,0,'nome');
 setlocale(LC_ALL, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese');
 date_default_timezone_set('Europe/Dublin');
$data=mysqli_result($registo_acao,0,'data_inicio');
$data=strftime('Loulé %d de %B de %Y', strtotime($data));
$data="DATA: ".$data." - ".$hora."H";
$data = stripslashes($data);
$data = iconv('UTF-8', 'windows-1252', $data);
$local="LOCAL: ".$local;
$local = stripslashes($local);
$local = iconv('UTF-8', 'windows-1252', $local);

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'FORMANDOS INSCRITOS' , 0);
$pdf->Ln(5);
$pdf->Cell(30, 8, '', 0);
$pdf->Cell(100, 8, $nome, 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 8,$data, 0);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(100, 8, $local, 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10);
 $pdf->SetFillColor(149,255,160);
    $pdf->SetDrawColor(54,172,69);
    $pdf->SetLineWidth(.3);
$pdf->Cell(85, 8, 'Nome', 1,0,'L',1);
$tele="Telemóvel";
$tele = stripslashes($tele);
$tele = iconv('UTF-8', 'windows-1252', $tele);
$pdf->Cell(45, 8, $tele, 1,0,'L',1);
$pdf->Cell(30, 8, 'Mail', 1,0,'L',1);
$pdf->Cell(30, 8, 'Escola', 1,0,'L',1);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);

$turma=mysqli_query(con(),"SELECT * FROM turma WHERE id_turma='$id_turma' ");
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $fill = false;
    $w = array(85,45,30,30);
for($m=0;$m<mysqli_num_rows($turma);$m++){
    $id_formando=mysqli_result($turma,$m,'id_formando');
    $formandos=mysqli_query(con(),"SELECT * FROM formando WHERE '$id_formando'=id_formando");
    $nome=mysqli_result($formandos,0,'nome');
    $tele=mysqli_result($formandos,0,'telemovel');
    $mail=mysqli_result($formandos,0,'e_mail');
    $escola=mysqli_result($formandos,0,'id_escola');
    $escola=mysqli_query(con(),"SELECT * FROM escola WHERE id_escola='$escola'");
    $escola=mysqli_result($escola,0,'nome');

    $pdf->Cell($w[0], 8,$nome,'LR',0,'L',$fill);
    $pdf->Cell($w[1], 8, $tele,'LR',0,'L',$fill);
    $pdf->Cell($w[2], 8, $mail,'LR',0,'L',$fill);
    $pdf->Cell($w[3], 8, $escola,'LR',0,'L',$fill);
    $pdf->Ln(8);
    $fill = !$fill;
}
$pdf->Cell(array_sum($w),0,'','T');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Output();
?>
