<?php
include('funcao_menu.php');
if(isset($_GET['id_acao']))$id_acao=$_GET['id_acao'];
$i=$_GET['i'];
$registos_acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE id_acao_formacao='$id_acao' ");
$registos_formador=mysqli_query(con(),"SELECT * FROM formador_acao_formacao WHERE id_acao_formacao='$id_acao' ");
$registos_releva=mysqli_query(con(),"SELECT COUNT(DISTINCT id_grupos) FROM releva WHERE id_acao_formacao='$id_acao' ");
for($x=0;$x<mysqli_num_rows($registos_releva);$x++){
  $id_acao[$x]=mysqli_result(con(),$x,'idgrupos');
}
$registos_formando_grupo=mysqli_query(con(),"SELECT COUNT(DISTINCT id_formando) FROM formando_grupo WHERE id_grupo IN ({implode(',', $id_acao)})");

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
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
<?php if($i==1){ ?>
  <table align="center" width="60%" border="0">
      <form action="edicao_insert.php?id_acao=<?php echo $id_acao; ?>&i=2" method="post" id="acao">
        <input type="hidden" value="<?php echo $id_acao; ?>" name="id">
  <tr>
    <td>Data de ínicio</td>
    <td><input type="text" id="datepicker1" name="data_ini"></td>
  </tr>
  <tr>
    <td align="char">Data de fim</td>
    <td><input type="text" id="datepicker2" name="data_fim"></td>
  </tr>
<tr>
  <td>Formadores &nbsp;</td>
  <td> <select name="formador[]" multiple="multiple" title="Formadores" size="4"  >
  <?php
  for($n=0;$n<mysqli_num_rows($registos_releva);$n++) {
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
    <td align="char">Número de turmas</td>
    <td><input type="text" name="turmas"></td>
  </tr>
  <tr><td colspan="2"> <input type=submit class="botao2" Value="Inserir"></td></tr>
</table>
<?php } else if ($i==2) {
  $id_acao=$_GET['id_acao'];
  $turmas=$_POST['turmas'];
  ?>
  <table border="1" align="center" width="90%">
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
  <?php  for($n=0;$n<$turmas;$n++){
  ?> <td> <select name="formando[]" multiple="multiple" title="Formandos" size="4"  >
  <?php } ?>
</tr>
<tr> <?php
  for($n=0;$n<mysqli_num_rows($registos_formando_grupo);$n++) {
    echo $n;
  $id_formando = mysqli_result($registos_formando_grupo,$n,'id_formando');
  $registos_formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando' ;");
  $nome = mysqli_result($registos_formandos,0,'nome'); ?>
  <td>
       <option value="<?php echo $id_formando; ?>"><?php echo $nome; ?></option>
       </td>
  <?php } ?>
  </select>
 </tr>
<tr>
  <td colspan=<?php echo $turmas;?>>
  <input type=submit class="botao2" Value="Inserir">
  </td>
</tr>

  </table>
<?php } else if ($i==3) {

}?>
</div>
 </body>
 </html>
