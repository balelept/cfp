<?php
require('fpdf.php');
require("connect.php");
require("result.php");
require('WriteTag.php');



class PDF extends FPDF
{

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
function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
    $k=$this->k;
    if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
    {
        $x=$this->x;
        $ws=$this->ws;
        if($ws>0)
        {
            $this->ws=0;
            $this->_out('0 Tw');
        }
        $this->AddPage($this->CurOrientation);
        $this->x=$x;
        if($ws>0)
        {
            $this->ws=$ws;
            $this->_out(sprintf('%.3F Tw',$ws*$k));
        }
    }
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $s='';
    if($fill || $border==1)
    {
        if($fill)
            $op=($border==1) ? 'B' : 'f';
        else
            $op='S';
        $s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
    }
    if(is_string($border))
    {
        $x=$this->x;
        $y=$this->y;
        if(is_int(strpos($border,'L')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
        if(is_int(strpos($border,'T')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        if(is_int(strpos($border,'R')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        if(is_int(strpos($border,'B')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
    }
    if($txt!='')
    {
        if($align=='R')
            $dx=$w-$this->cMargin-$this->GetStringWidth($txt);
        elseif($align=='C')
            $dx=($w-$this->GetStringWidth($txt))/2;
        elseif($align=='FJ')
        {
            //Set word spacing
            $wmax=($w-2*$this->cMargin);
            $this->ws=($wmax-$this->GetStringWidth($txt))/substr_count($txt,' ');
            $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
            $dx=$this->cMargin;
        }
        else
            $dx=$this->cMargin;
        $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
        if($this->ColorFlag)
            $s.='q '.$this->TextColor.' ';
        $s.=sprintf('BT %.2F %.2F Td (%s) Tj ET',($this->x+$dx)*$k,($this->h-($this->y+.5*$h+.3*$this->FontSize))*$k,$txt);
        if($this->underline)
            $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
        if($this->ColorFlag)
            $s.=' Q';
        if($link)
        {
            if($align=='FJ')
                $wlink=$wmax;
            else
                $wlink=$this->GetStringWidth($txt);
            $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$wlink,$this->FontSize,$link);
        }
    }
    if($s)
        $this->_out($s);
    if($align=='FJ')
    {
        //Remove word spacing
        $this->_out('0 Tw');
        $this->ws=0;
    }
    $this->lasth=$h;
    if($ln>0)
    {
        $this->y+=$h;
        if($ln==1)
            $this->x=$this->lMargin;
    }
    else
        $this->x+=$w;
}
// Page header
function Header()
{
    $this->Image('banner.jpg' ,0,3, 300 , 25,'jpg');
    $this->SetFont('Arial','B',15);
    $this->SetDrawColor(68,155,10);
    $this->SetLineWidth(1);
    $this->Ln(21);
    $this->Setx(0);
    $this->Cell('300','',"",1);
    $this->Ln(10);
    $this->Image('background.jpg',110, 70, 100, 100);
}

// Page footer
function Footer()
{

    $this->Image('logo2.png' , 80 ,170, 48 , 30,'png');
    $this->Image('logo_edu.png' ,12 ,174, 48 , 25,'png');
     $this->SetDrawColor(68,155,10);
    $this->SetLineWidth(1);
    $this->SetXY(0,-8);
    $this->Cell('300','0',"",'T');

}

}



$id_turma=$_GET['id_turma'];
$registos_turma=mysqli_query(con(),"SELECT * FROM turma WHERE id_turma='$id_turma'");
$id_edicao=mysqli_query(con(),"SELECT * FROM turma WHERE '$id_turma'=id_turma GROUP BY id_turma");
$id_edicao=mysqli_result($id_edicao,0,'id_edicao_formacao');
$registos_acao=mysqli_query(con(),"SELECT * FROM edicao_formacao WHERE '$id_edicao'=id_edicao");
$id_acao=mysqli_result($registos_acao,0,'id_acao_formacao');
$acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE '$id_acao'=id_acao_formacao");
$nome_acao=mysqli_result($acao,0,'nome');
$registos_formador_edicao=mysqli_query(con(),"SELECT * FROM edicao_formador WHERE id_edicao='$id_edicao';");
$formador2="";
 for($v=0;$v<mysqli_num_rows($registos_formador_edicao);$v++){
       $formador=mysqli_result($registos_formador_edicao,$v,'id_formador');
       $formador=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$formador';");
       $formador2=$formador2." e ".$formador=mysqli_result($formador,0,'nome');
    }
    $formador2 = stripslashes($formador2);
    $formador2 = iconv('UTF-8', 'windows-1252', $formador2);

$pdf = new PDF('L','mm','A4');
for($s=0;$s<mysqli_num_rows($registos_turma);$s++){
// Instanciation of inherited class

$id_formando=mysqli_result($registos_turma,$s,'id_formando');
$formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando'");
$nome=mysqli_result($formandos,0,'nome');
//$bi=mysql_result($formandos,0,'bi');
 $reg_acreditacao=mysqli_result($acao,0,'codigo');
$bi="--BI--";
$modalidade=mysqli_result($acao,0,'id_modalidade');
$registos_modalidade=mysqli_query(con(),"SELECT * FROM modalidade WHERE id_modalidade='$modalidade'");
$modalidade=mysqli_result($registos_modalidade,0,'nome');
$horaspresen=mysqli_result($acao,0,'horas_pre');
$horasnpresen=mysqli_result($acao,0,'horas_nao_pre');
$total_horas=$horaspresen+$horasnpresen;
$nota=mysqli_result($registos_turma,$s,'nota');

//$mencao_qual
if($nota<6.4){
    $mencao_qual="Regular";
}else if ($nota<7.9){
    $mencao_qual="Bom";
}else if($nota<8.9) {
    $mencao_qual="Muito Bom";
}else if($nota<=10){
    $mencao_qual="Excelente";
}

$data_ini=mysqli_result($registos_acao,0,'data_inicio');
$data_ini=date('d/m/Y',strtotime($data_ini));
$data_fim=mysqli_result($registos_acao,0,'data_fim');
$data_fim=date('d/m/Y',strtotime($data_fim));
    $nome_grupo_5="";
    $nome_grupo_14="";

    $registos_releva_artigo5=mysqli_query(con(),"SELECT * FROM releva WHERE id_acao_formacao='$id_acao' AND id_artigo='5'");
    for($n=0;$n<mysqli_num_rows($registos_releva_artigo5);$n++){
    $id_grupo=mysqli_result($registos_releva_artigo5,$n,'id_grupos');
    $registos_grupo=mysqli_query(con(),"SELECT * FROM grupos WHERE id_grupos='$id_grupo'");
    $nome_grupo_5=$nome_grupo_5." e ".mysqli_result($registos_grupo,0,'nome');
    }

    $registos_releva_artigo14=mysqli_query(con(),"SELECT * FROM releva WHERE id_acao_formacao='$id_acao' AND id_artigo='14'");
    for($n=0;$n<mysqli_num_rows($registos_releva_artigo14);$n++){
    $id_grupo=mysqli_result($registos_releva_artigo14,$n,'id_grupos');
    $registos_grupo=mysqli_query(con(),"SELECT * FROM grupos WHERE id_grupos='$id_grupo'");
    $nome_grupo_14=$nome_grupo_14." e ".mysqli_result($registos_grupo,0,'nome');
    }
    $nome_grupo_14 = substr($nome_grupo_14, 3);
    $nome_grupo_5 = substr($nome_grupo_5, 3);

    if($nome_grupo_14 != NULL){
        $relevancia="INCIDE";

    } else {
      $relevancia="NÃO INCIDE";
    }

$pdf->AddPage('L');
$pdf->Cell('120','8',"",0);
$pdf->SetTextColor(4,47,85);
$pdf->SetFont('Arial','B',40);
$pdf->Cell('160','8',"CERTIFICADO",0,1,'C',false);
$pdf->Ln(3);
$pdf->Cell('120','8',"",0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',9);

$string1="Certifica-se que ".$nome;
$string1 = stripslashes($string1);
$string1 = iconv('UTF-8', 'windows-1252', $string1);
$pdf->Cell('160','8',$string1,0,1,'L',false);
$pdf->Ln(3);
$pdf->Cell('120','8',"",0);

$string2="Portador(a) do BI/CC n.º".$bi.", frequentou com aproveitamento e de acordo com as condições de frequência a ação de formação contínua na modalidade de ".$modalidade.", com o registo de acreditação n.º ".$reg_acreditacao.".";
$nb=$pdf->WordWrap($string2,160);
$string2 = stripslashes($string2);
$string2 = iconv('UTF-8', 'windows-1252', $string2);
$pdf->MultiCell('160','5',$string2,0,'',false);


$pdf->Ln(3);
$pdf->Cell('120','8',"",0);
$string3="Orientada por ".$formador;
$nb=$pdf->WordWrap($string3,160);
$string3 = stripslashes($string3);
$string3 = iconv('UTF-8', 'windows-1252', $string3);
$pdf->MultiCell('160','8',$string3,0,'L',false);
$pdf->Ln(6);

$pdf->Cell('120','8',"",0);
$string4="que decorreu de ".$data_ini." a ".$data_fim." com a duração de ".$total_horas." horas tendo obtido a classificação de ".$nota." valores e menção qualitativa de ".$mencao_qual;
$nb=$pdf->WordWrap($string4,160);
$string4 = stripslashes($string4);
$string4 = iconv('UTF-8', 'windows-1252', $string4);
$pdf->MultiCell('160','5',$string4,0,'',false);
$pdf->Ln(6);


$pdf->Cell('120','8',"",0);
$string5="Mais se certifica que, a presente ação, reconhecida pelo Centro de Formação do Litoral à Serra (Associação de Escolas dos Concelhos de Loulé e de S. Brás de Alportel), é válida para os efeitos de preenchimento dos requisitos previstos para a avaliação do desempenho e para a progressão na carreira dos ".$nome_grupo_5." em exercício de funções em estabelecimentos de ensino não superior, de acordo com o artigo 9.º do Regime Jurídico da Formação Contínua de Professores (Decreto-Lei n.º 22/2014, de 11 de Fevereiro), e ".$relevancia." na dimensão científica e pedagógica da docência ".$nome_grupo_14.".";
$nb=$pdf->WordWrap($string5,160);
$string5 = stripslashes($string5);
$string5 = iconv('UTF-8', 'windows-1252', $string5);
$pdf->MultiCell('160','5',$string5,'0','J',false);
$pdf->Cell('120','8',"",'0');

$pdf->SetTextColor(4,47,85);
$pdf->SetFont('Arial','B',22);
$nb=$pdf->WordWrap($string6,80);
$string6 = stripslashes($nome_acao);
$string6 = iconv('UTF-8', 'windows-1252', $string6);
$pdf->SetXY('10','80');
$pdf->MultiCell('110','7',$string6,'0','C');

$pdf->SetTextColor(4,47,85);
$pdf->SetFont('Arial','',18);
$subtitulo="--Subtitulo--";
$string7 = stripslashes($subtitulo);
$string7 = iconv('UTF-8', 'windows-1252', $string7);
$nb=$pdf->WordWrap($string7,80);
$pdf->SetXY('10','110');
$pdf->MultiCell('110','7',$string7,'0','C');

$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);
setlocale(LC_ALL, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese');
date_default_timezone_set('Europe/Dublin');
$data_hoje=strftime('Loulé, %d de %B de %Y', strtotime('today'));
$pdf->SetXY('180','-50');
$data_hoje = stripslashes($data_hoje);
$data_hoje = iconv('UTF-8', 'windows-1252', $data_hoje);
$pdf->Cell('80','7',$data_hoje,'0','2','C');
$pdf->Cell('80','7',"O Diretor",'0','2','C');
$pdf->SetFont('Arial','',6);
$pdf->Cell('80','7',"__________________________________________",'0','2','C');
$pdf->SetFont('Arial','',9);
$pdf->Cell('80','4',"(Manuel Correia Caetano Nora)",'0','2','C');
 }

$pdf->Output();
?>
