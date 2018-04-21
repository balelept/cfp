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
$id_edicao=mysqli_query(con(),"SELECT * FROM turma WHERE '$id_turma'=id_turma GROUP BY id_turma");
$id_edicao=mysqli_result($id_edicao,0,'id_edicao_formacao');
$registo_acao=mysqli_query(con(),"SELECT * FROM edicao_formacao WHERE '$id_edicao'=id_edicao");
$id_acao=mysqli_result($registo_acao,0,'id_acao_formacao');
$acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE '$id_acao'=id_acao_formacao");
$registos_turma=mysqli_query(con(),"SELECT * FROM turma WHERE id_turma='$id_turma'");
$nome=mysqli_result($acao,0,'nome');

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetLineWidth(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$modalidade=mysqli_result($acao,0,'id_modalidade');
$registos_modalidade=mysqli_query(con(),"SELECT * FROM modalidade WHERE id_modalidade='$modalidade'");
$modalidade = stripslashes($modalidade=mysqli_result($registos_modalidade,0,'nome'));
$modalidade = iconv('UTF-8', 'windows-1252', $modalidade);
$pdf->Cell(190,7,$modalidade,0,0,'C',true);
$pdf->Ln(7);

$registos_formador_edicao=mysqli_query(con(),"SELECT * FROM edicao_formador WHERE id_edicao='$id_edicao';");
$formador2="";
 for($v=0;$v<mysqli_num_rows($registos_formador_edicao);$v++){
       $formador=mysqli_result($registos_formador_edicao,$v,'id_formador');
       $formador=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$formador';");
       $formador=mysqli_result($formador,0,'nome');
       $formador2=$formador2." e ".$formador;
    }
    $formador2 = substr($formador2, 3);

$pdf->SetFont('Arial','I',10);
$acao = stripslashes($modalidade=mysqli_result($acao,0,'nome'));
$acao = iconv('UTF-8', 'windows-1252', $acao);
$pdf->Cell(190,7,'"'.$acao.'"',0,0,'C',true);
 $pdf->Ln(7);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,7,'Formador:',0,0,'L',true);
$pdf->SetFont('Arial','',10);
$pdf->Cell(165,7,$formador2,0,0,'L',true);
$pdf->Ln(7);
$string = stripslashes("Lista de presenças");
$string = iconv('UTF-8', 'windows-1252', $string);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,$string,0,0,'C',true);
 $pdf->Ln(10);

    $w = array(10, 90, 90);
    $pdf->SetDrawColor(54,172,69);
    $pdf->Cell($w[0], 8, '', 'B',0,'L',1);
    $pdf->SetFillColor(149,255,160);

    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');
    $pdf->Cell($w[1], 8, 'Nome', 1,0,'L',1);
    $pdf->Cell($w[2], 8, 'Assinatura', 1,0,'L',1);

$pdf->SetFont('Arial','',10);
$pdf->Ln(8);

$fill = false;

     for($i=0;$i<mysqli_num_rows($registos_turma);$i++){
        $id_formando=mysqli_result($registos_turma,$i,'id_formando');
        $formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando'");
        $nome=mysqli_result($formandos,0,'nome');
        $pdf->Cell($w[0],8,$i+1,'LR',0,'L',$fill);
        $pdf->Cell($w[1],8,$nome,'LR',0,'L',$fill);
        $pdf->Cell($w[2],8,"",'LR',0,'L',$fill);
        $pdf->Ln();
        $fill = !$fill;
    }
    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Ln(8);
    $pdf->SetLineWidth(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFillColor(255,255,255);

    $pdf->Cell(10,8,"",0,0,'C');
    $string = stripslashes("Horário");
    $string = iconv('UTF-8', 'windows-1252', $string);
    $pdf->Cell(80,8,$string,0,0,'C');
    $pdf->Cell(20,8,"",0,0,'C');
    $pdf->Cell(80,8,"Data",0,0,'C');
    $pdf->Ln(7);

    $pdf->Cell(10,12,"",0,0,'C');
    $string = stripslashes("Das ____h____ às ____h____");
    $string = iconv('UTF-8', 'windows-1252', $string);
    $pdf->Cell(80,12,$string,0,0,'C');
    $pdf->Cell(20,12,"",0,0,'C');
    $pdf->Cell(80,12,"____/____/____",0,0,'C');
    $pdf->Ln(7);

    $pdf->Cell(10,15,"",0,0,'C');
    $pdf->Cell(80,15,"Pela Entidade Promotora",0,0,'C');
    $pdf->Cell(20,15,"",0,0,'C');
    $pdf->Cell(80,15,"O formador",0,0,'C');
    $pdf->Ln(7);

    $pdf->Cell(10,15,"",0,0,'C');
    $pdf->Cell(80,15,"__________________________",0,0,'C');
    $pdf->Cell(20,15,"",0,0,'C');
    $pdf->Cell(80,15,"__________________________",0,0,'C');
    $pdf->Ln(7);

$pdf->Output();
?>
