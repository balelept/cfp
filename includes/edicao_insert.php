<?php
include('funcao_menu.php');
if(isset($_GET['id_acao']))$id_acao=$_GET['id_acao'];
$i=$_GET['i'];
$registos_acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE id_acao_formacao='$id_acao' ");
$registos_formador=mysqli_query(con(),"SELECT * FROM formador_acao_formacao WHERE id_acao_formacao='$id_acao' ");
$registos_releva=mysqli_query(con(),"SELECT COUNT(DISTINCT id_grupos) FROM releva WHERE id_acao_formacao='$id_acao' ");
for($x=0;$x<mysqli_num_rows($registos_releva);$x++){
  $id_grupo[$x]=mysqli_result($registos_releva,$x,'id_grupo');
  }
$grupos=implode(',', $id_grupo);
$registos_formando_grupo=mysqli_query(con(),"SELECT DISTINCT id_formando FROM formando_grupo");

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<link rel="stylesheet" href="docsupport/prism.css">
<link rel="stylesheet" href="chosen.css">
<meta http-equiv="Content-Security-Policy" content="default-src &apos;self&apos;; script-src &apos;self&apos; https://ajax.googleapis.com; style-src &apos;self&apos;; img-src &apos;self&apos; data:">


<script>
$(function() {
  $( "#datepicker1" ).datepicker();
  $( "#datepicker2" ).datepicker();
});
</script>
<html>
<head>
<div class="cabec">
  <style>
  th, td {
      text-align: center;
      padding: 8px;
  }
  </style>
   <table  width="100%" border="0">
   <tr>
   <th text-align="center"> <font size="5">Criar uma edição de uma ação de formação</font> </th>
   </tr>
   </table>
</div>
 </head>
 <body>
<div class="corpo">
  <div class="side-by-side clearfix">
<?php if($i==1){ ?>
  <table align="center" width="60%" border="0">
      <form action="edicao_insert.php?id_acao=<?php echo $id_acao; ?>&i=2" method="post" id="acao">
        <input type="hidden" value="<?php echo $id_acao; ?>" name="id">
  <tr>
    <td>Data do ínicio</td>
    <td><input type="text" id="datepicker1" name="data_ini"></td>
  </tr>
  <tr>
    <td align="char">Data do fim</td>
    <td><input type="text" id="datepicker2" name="data_fim"></td>
  </tr>
<tr>
  <td>Formadores &nbsp;</td>
  <td> <select name="formador[]" multiple="multiple" title="Formadores" size="4"  >
  <?php
  for($n=0;$n<mysqli_num_rows($registos_formador);$n++) {
    echo $n;
  $id_formando = mysqli_result($registos_formador,$n,'id_formador');
  $registos_formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando' ;");
  $nome = mysqli_result($registos_formandos,0,'nome'); ?>
       <option value="<?php echo $id_formando; ?>"><?php echo $nome; ?></option>
  <?php } ?>
  </select>
</td>
</tr>
  <tr>
    <td align="char">Numero de turmas</td>
    <td><input type="text" name="turmas"></td>
  </tr>
  <tr><td colspan="2"> <input type=submit class="botao2" Value="Inserir"></td></tr>
</table>
<?php } else if ($i==2) {
  $id_acao=$_GET['id_acao'];
  $dataini=$_POST['data_ini'];
  $datafim=$_POST['data_fim'];
  $formador=$_POST['formador'];
  $turmas=$_POST['turmas'];
  ?>
  <table border="0" align="center" width="90%">
   <tr>
       <?php
for($n=0;$n<$turmas;$n++){
  ?> <td> <?php
  $num=$n+1;
  echo "Insira a turma numero ".$num.":";
?> </td> <?php }
?>
   </tr>
   <tr>
       <form action="edicao_insert.php?id_acao=<?php echo $id_acao; ?>&i=3" method="post" id="acao">
         <input type="hidden" name="dataini" value="<?php echo $dataini; ?>">
         <input type="hidden" name="datafim" value="<?php echo $datafim;?>">
         <input type="hidden" name="turma" value="<?php echo $turmas;?>">
         <?php
         $postvalue=array("a","b","c");

foreach($formador as $forma)
{
  ?>
  <input type="text" name="formador[]" value="<?php echo $forma; ?> "><?php

}

 for($z=0;$z<$turmas;$z++){
  ?> <td> <select data-placeholder="Escolha o formando" class="chosen-select" multiple tabindex="4" tabindex="1" name="turma<?php echo $z; ?>[]">
<?php
  for($n=0;$n<mysqli_num_rows($registos_formando_grupo);$n++) {

  $id_formando = mysqli_result($registos_formando_grupo,$n,'id_formando');
  $registos_formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando' ;");
  $nome = mysqli_result($registos_formandos,0,'nome'); ?>
       <option value="<?php echo $id_formando; ?>" ><?php echo $nome; ?></option>
  <?php } ?>
</td>   </select>
    <?php } ?>
 </tr>
<tr>
  <td colspan=<?php echo $turmas;?>>
  <input type=submit class="botao2" Value="Inserir">
  </td>
</tr>
<script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="chosen.jquery.js" type="text/javascript"></script>
<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>
  </table>
<?php } else if ($i==3) {
  $id_acao=$_GET['id_acao'];
  $dataini=$_POST['dataini'];
  $datafim=$_POST['datafim'];
  $numturma=$_POST['turma'];
  $dataini=date('Y-m-d', strtotime($dataini));
  $datafim=date('Y-m-d', strtotime($datafim));

  $registos_edicao=mysqli_query(con(),"SELECT * FROM edicao_formacao ORDER BY id_edicao;");
    $id=0;

  for($m=0;$m<mysqli_num_rows($registos_edicao);$m++){
      $id2  = mysqli_result($registos_edicao, $m,'id_edicao');
       if($id2>$id) $id=$id2;
  }
  $id_edicao=$id+1;

  $insert = "INSERT INTO edicao_formacao (id_edicao,id_acao_formacao,data_inicio,data_fim) VALUES ('$id_edicao','$id_acao','$dataini','$datafim')";
  $result = mysqli_query(con(),$insert);



$query =mysqli_query(con(),"SELECT * FROM turma");
$id_turma=0;
for($c=0;$c<mysqli_num_rows($query);$c++){
    if($id_turma<mysqli_result($query,$c,'id_turma')){
    $id_turma =mysqli_result($query,$c,'id_turma');
    }
}

for($b=0;$b<$numturma;$b++){
   $num="turma".$b;
   $turma=$id_turma+$b+1;
  if(!empty($_POST[$num])) {
  foreach($_POST[$num] as $formando) {
    $insert2 = "INSERT INTO turma (id_turma,id_formando,id_edicao_formacao) VALUES ('$turma','$formando','$id_edicao')";
    $result2 = mysqli_query(con(), $insert2);
  }
 }
 }


  if(!empty($_POST['formador'])) {
     foreach($_POST['formador'] as $formador) {
       $insert3 = "INSERT INTO edicao_formador (id_formador,id_edicao) VALUES ('$formador','$id_edicao')";
        $result3 = mysqli_query(con(), $insert3);
    }
    }

    }
?>
</div>
</div>
 </body>
 </html>
