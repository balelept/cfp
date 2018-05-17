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
function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
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
    // Calculate width of title and position
    $pdf->SetX((30)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(54,172,69);
    $pdf->SetLineWidth(.3);
    $pdf->SetFillColor(149,255,160);
    // Thickness of frame (1 mm)
    // Title
    $pdf->Cell(180,7,'PAUTA',1,1,'C',true);
    // Line break
    $pdf->SetFont('Arial','B',10);
    $pdf->SetLineWidth(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFillColor(255,255,255);
    $pdf->Ln(10);
    $string1 = "Designação da Ação:";
    $string1 = stripslashes($string1);
    $string1 = iconv('UTF-8', 'windows-1252', $string1);
    $pdf->Cell(40,7,$string1,0);
    $pdf->Cell(5,7,"",0);
    $string2 = mysqli_result($acao,0,'nome');
    $string2 = stripslashes($string2);
    $string2 = iconv('UTF-8', 'windows-1252', $string2);
    $pdf->Cell(145,15,$string2,1,1,'L',true);
    $string3 = "Destinatários:";
    $string3 = stripslashes($string3);
    $string3 = iconv('UTF-8', 'windows-1252', $string3);
    $pdf->Cell(40,7,$string3,0);
    $pdf->Cell(5,7,"",0);
    $nome_grupo="";
    $registos_releva=mysqli_query(con(),"SELECT * FROM revela WHERE id_acao_formacao='$id_acao' AND id_artigo='5'");
    for($n=0;$n<mysqli_num_rows($registos_releva);$n++){
    $id_grupo=mysqli_result($registos_releva,$n,'id_grupos');
    $registos_grupo=mysqli_query(con(),"SELECT * FROM grupos WHERE id_grupos='$id_grupo'");
    $nome_grupo=$nome_grupo." e ".mysqli_result($registos_grupo,0,'nome');
    }
    $nome_grupo = substr($nome_grupo, 3);
    $string4 = $nome_grupo;
    $string4 = stripslashes($string4);
    $string4 = iconv('UTF-8', 'windows-1252', $string4);
    $pdf->Cell(145,15,$string4,1,1,'L',true);
    $pdf->Ln(3);
    $pdf->Cell(40,7,"Formador(a):",0);
    $pdf->Cell(5,7,"",0);
    $registos_formador_edicao=mysqli_query(con(),"SELECT * FROM edicao_formador WHERE id_edicao='$id_edicao';");
    $formador2="";
     for($v=0;$v<mysqli_num_rows($registos_formador_edicao);$v++){
           $formador=mysqli_result($registos_formador_edicao,$v,'id_formador');
           $formador=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$formador';");
           $formador=mysqli_result($formador,0,'nome');
           $formador2=$formador2." e ".$formador;
        }
    $formador2 = substr($formador2,3);
    $string5 = $formador2;
    $string5 = stripslashes($string5);
    $string5 = iconv('UTF-8', 'windows-1252', $string5);
    $pdf->Cell(145,7,$string5,1,1,'L',true);
    $pdf->Ln(3);
    $string6 = mysqli_result($acao,0,'codigo');
    $string6 = stripslashes($string6);
    $string6 = iconv('UTF-8', 'windows-1252', $string6);
    $string16= "Reg. Acreditação n.º:";
    $string16 = stripslashes($string16);
    $string16 = iconv('UTF-8', 'windows-1252', $string16);
    $pdf->Cell(40,7,$string16,0);
    $pdf->Cell(5,7,"",0);
    $pdf->Cell(60,7,$string6,1,0,'L',true);
    $data_ini=mysqli_result($acao,0,'data_inicio');
    $data_ini=date('d/m/Y',strtotime($data_ini));
    $data_s = "Data Início:";
    $data_s = stripslashes($data_s);
    $data_s = iconv('UTF-8', 'windows-1252', $data_s);
    $pdf->Cell(20,7,$data_s,0);
    $pdf->Cell(5,7,"",0);
    $pdf->Cell(60,7,$data_ini,1,1,'C',true);
    $pdf->Ln(3);
    $n_turma="";
    $turmas=mysqli_query(con(),"SELECT * FROM turma WHERE id_edicao_formacao='$id_edicao' GROUP BY id_turma");
    for($m=0;$m<mysqli_num_rows($turmas);$m++){
      if($id_turma==mysqli_result($turmas,$m,'id_turma')){ $n_turma=$m+1;}
    }

    $pdf->Cell(40,7,"Turma:",0);
    $pdf->Cell(5,7,"",0);
    $pdf->Cell(60,7,$n_turma,1,0,'L',true);
    $data_fim=mysqli_result($acao,0,'data_fim');
    $data_fim=date('d/m/Y',strtotime($data_fim));
    $pdf->Cell(20,7,"Data Fim:",0);
    $pdf->Cell(5,7,"",0);
    $pdf->Cell(60,7,$data_fim,1,1,'C',true);
    $pdf->Ln(3);
    $modalidade=mysqli_result($acao,0,'id_modalidade');
    $registos_modalidade=mysqli_query(con(),"SELECT * FROM modalidade WHERE id_modalidade='$modalidade'");
    $modalidade=mysqli_result($registos_modalidade,0,'nome');
    $pdf->Cell(40,7,"Modalidade:",0);
    $pdf->Cell(5,7,"",0);
    $string7 = $modalidade;
    $string7 = stripslashes($string7);
    $string7 = iconv('UTF-8', 'windows-1252', $string7);
    $pdf->Cell(60,7,$string7,1,0,'L',true);

     $horaspresen =mysqli_Result($acao,0,'horas_pre');
     $horasnpresen =mysqli_Result($acao,0,'horas_nao_pre');
     $total=$horaspresen+$horasnpresen;
     $horas=$total." Horas (".$horaspresen."H presenciais conjuntas +".$horasnpresen."H trabalho autónomo)";
     $nb=$pdf->WordWrap($horas,60);
    $pdf->Cell(20,7,"Horas",0);
    $pdf->Cell(5,7,"",0);
    $string8 = $horas;
    $string8 = stripslashes($string8);
    $string8 = iconv('UTF-8', 'windows-1252', $string8);
    $pdf->MultiCell(60,7,$string8,1,'C','C',true);
    $pdf->Ln(8);
    $pdf->SetFillColor(149,255,160);
    $pdf->SetDrawColor(54,172,69);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');

    $pdf->Cell(80, 8, 'Nome Formando', 1,0,'L',1);
    $pdf->Cell(65, 8, 'Agrup/Escola', 1,0,'L',1);
    $string9 = "Classificação* /Menção";
    $string9 = stripslashes($string9);
    $string9 = iconv('UTF-8', 'windows-1252', $string9);
    $pdf->Cell(45, 8,$string9, 1,0,'L',1);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    $fill = false;
    $w = array(80, 65, 45);
     for($i=0;$i<mysqli_num_rows($registos_turma);$i++){
        $id_formando=mysqli_result($registos_turma,$i,'id_formando');
        $formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando'");
        $escola=mysqli_result($formandos,0,'id_escola');
        $escolas=mysqli_query(con(),"SELECT * FROM escola WHERE id_escola='$escola'");
        $nome=mysqli_result($formandos,0,'nome');
        $nota=mysqli_result($registos_turma,$i,'nota');
        $escola =mysqli_result($escolas,0,'nome');
        $escola = stripslashes($escola);
        $escola = iconv('UTF-8', 'windows-1252', $escola);
        $nome = stripslashes($nome);
        $nome = iconv('UTF-8', 'windows-1252', $nome);


        if($nota==-3){
        $nota="Nota não atribuida";
        }else if ($nota==-2){
        $nota="Não certificado";
        }else if($nota==-1) {
        $nota="DESISTIU";
        }else if($nota<=4.9){
        $nota=$nota." - Insuficiente";
        }else if($nota<=6.4){
        $nota=$nota." - Regular";
        }else if($nota<=7.9){
        $nota=$nota." - Bom";
        }else if($nota<=8.9){
        $nota=$nota." - Muito Bom";
        }else if($nota<=10){
        $nota=$nota." - Excelente";
        }
        $nota = stripslashes($nota);
        $nota = iconv('UTF-8', 'windows-1252', $nota);
        $pdf->Cell($w[0],8,$nome,'LR',0,'L',$fill);
        $pdf->Cell($w[1],8,$escola,'LR',0,'L',$fill);
        $pdf->Cell($w[2],8,$nota,'LR',0,'L',$fill);
        $pdf->Ln();
        $fill = !$fill;
    }
    $pdf->Cell(array_sum($w),0,'','T');

    $pdf->SetLineWidth(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','I',7);
   $pdf->Ln(3);
    $pdf->Cell(20,7);
    $pdf->Cell(80, 7, '* Escala de 0 a 10', 0,'C','L',1);
    $pdf->Ln(20);
    $pdf->SetFont('Arial','',10);
    setlocale(LC_ALL, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese');
    date_default_timezone_set('Europe/Dublin');
    $data_hoje=strftime('Loulé %d de %B de %Y', strtotime('today'));
    $data_hoje = stripslashes($data_hoje);
    $data_hoje = iconv('UTF-8', 'windows-1252', $data_hoje);
    $pdf->Cell(60,7);
    $pdf->Cell(80, 7, $data_hoje, 0,1,'C',true);
    $pdf->Cell(60,7);
    $string10 = "O Diretor do Centro de Formação";
    $string10 = stripslashes($string10);
    $string10 = iconv('UTF-8', 'windows-1252', $string10);
    $pdf->Cell(80, 7,$string10, 0,1,'C',true);
    $pdf->Cell(60,15);
    $pdf->Cell(80, 15,"______________________________", 0,1,'C',true);
    $pdf->SetFont('Arial','I',9);
    $pdf->Cell(60,7);
    $pdf->Cell(80, 7,"(Manuel Correia Caetano Nora)", 0,1,'C',true);

$pdf->Output();
?>
