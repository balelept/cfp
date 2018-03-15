<?php
include('funcao_menu.php');

?>
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
   <th text-align="center"> <font size="5">Centros de Formacao</font> </th>
   </tr>
   </table>
</div>
 </head>
 <body>
<div class="corpo">
  <div class="formu">
<?php
$fase = $_GET['i'];
$registos_grupos=mysqli_query(con(),"SELECT * FROM grupos ORDER BY id_grupos ;");
$registos_area_formacao=mysqli_query(con(),"SELECT * FROM area_formacao ORDER BY id_area_formacao ;");
$registos_modalidade=mysqli_query(con(),"SELECT * FROM modalidade ORDER BY id_modalidade ;");
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
  $( "#datepicker1" ).datepicker();
  $( "#datepicker2" ).datepicker();
  $( "#datepicker3" ).datepicker();
});
</script>

<?php
if ($fase==1){ ?>
<form action="acao_formacao_insert.php?i=2" method="post" id="acao">
  <style>
  table {
      border-collapse: collapse;
      width: 100%;
      font-family: "verdana"
  }
  tr:nth-child(even){background-color: #D1F9B3}

  tr{
      font-size:small;
  }
  </style>
<table width="100%" border="0">
  <tr>
    <th colspan="6"> <h1> Criar uma ação</h1> </th>
  </tr>
 <tr>
   <td>C&oacute;digo:</td>
   <td colspan="5"><input type="text" name="codigo" value="" size="100%"></td>
 </tr>
 <tr>
   <td>Nome:</td>
   <td colspan="5"><input type="text" name="nome" value="" size="100%"></td>
 </tr>
 <tr>
   <td>SubNome:</td>
   <td colspan="5"><input type="text" name="subnome" value="" size="100%"></td>
 </tr>
 <tr>
   <td>Releva:</td>
   <td>artigo 5 &nbsp;
   <select name="artigo5[]" multiple="multiple" title="Artigo 5" size="4"  >
   <?php
   for($n=0;$n<mysqli_num_rows($registos_grupos);$n=$n+1) {
   $codigo = mysqli_result($registos_grupos,$n,'codigo');
   $id = mysqli_result($registos_grupos,$n,'id_grupos');
   $nome = mysqli_result($registos_grupos,$n,'nome');   ?>
        <option value="<?php echo $id ?>"><?php echo $codigo."|".$nome; ?></option>
   <?php } ?>
   </select>
   </td>
   <td>artigo 14 &nbsp;
    <select name="artigo14[]" multiple="multiple" title="Artigo 14" size="4"  >
   <?php
   for($n=0;$n<mysqli_num_rows($registos_grupos);$n++) {
   $codigo = mysqli_result($registos_grupos,$n,'codigo');
   $id = mysqli_result($registos_grupos,$n,'id_grupos');
   $nome = mysqli_result($registos_grupos,$n,'nome');   ?>
        <option value="<?php echo $id; ?>"><?php echo $codigo."|".$nome; ?></option>
   <?php } ?>
   </select>
   </td>
   <td>Destinatários:</td>
   <td colspan="2">
   <select name="something" >
        <option value="destinatiros">Docente</option>
        <option value="destinaratios">Não Docente</option>
   </select>
   </td>

 </tr>
 <tr>
   <td>&Aacute;rea</td>
   <td colspan="3">
   <select name="area"   >
   <?php
   for($n=0;$n<mysqli_num_rows($registos_area_formacao);$n=$n+1) {
   $codigo = mysqli_result($registos_area_formacao,$n,'codigo');
   $id = mysqli_result($registos_area_formacao,$n,'id_area_formacao');
   $nome = mysqli_result($registos_area_formacao,$n,'nome');   ?>
        <option value="<?php echo $id ?>"><?php echo $codigo."|".$nome; ?></option>
   <?php } ?>
   </select>
   </td>
   <td>Modalidade</td>
   <td>
<select name="modalidade">
   <?php
   for($n=0;$n<mysqli_num_rows($registos_modalidade);$n=$n+1) {
   $id = mysqli_result($registos_modalidade,$n,'id_modalidade');
   $nome = mysqli_result($registos_modalidade,$n,'nome');   ?>
        <option value="<?php echo $id ?>"><?php echo $nome; ?></option>
   <?php } ?>
   </select>
   </td>
 </tr>
 <tr>
   <td>Dura&ccedil;&atilde;o (Horas)</td>
   <td><input type="text" name="total"  size="1"></td>
   <td align="right">Presencial:</td>
   <td><input type="text" name="presen"  size="1"></td>
   <td>N&atilde;o presencial</td>
   <td><input type="text" name="npresen"  size="1"></td>
 </tr>
 <tr>
   <td align="char">Avaliação:</td>
   <td colspan="3"><textarea rows="1" cols="45" name="avaliacao" form="acao"></textarea></td>
   <td>Cr&eacute;ditos</td>
   <td> <input type="text" name="nome"  readonly="readonly"></td>
 </tr>
 <tr>
   <td>Observa&ccedil;&otilde;es</td>
   <td colspan="5"><textarea rows="1" cols="45" name="observacao" form="acao"></textarea></td>
 </tr>
 <tr>
   <td align="char" >Data da proposta</td>
   <td ><input type="text" id="datepicker1" name="data_prop"></td>
   <td colspan="2" > </td>
 </tr>
 <tr>
   <td>Data de acreditação</td>
   <td colspan="1"><input type="text" id="datepicker2" name="data_acreditacao"></td>
   <td align="char" >Data de validade</td>
   <td ><input type="text" id="datepicker3" name="data_validade"></td>
   <td colspan="2" > </td>
 </tr>
 <input type=submit class="botao2" Value="Inserir">
</table>
<?php } else if ($fase==2){

  ?>
  <form action="acao_formacao_insert.php?i=2" method="post" id="acao">
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "verdana"
    }
    tr:nth-child(even){background-color: #D1F9B3}

    tr{
        font-size:small;
    }
    </style>
  <table width="100%" border="0">
    <tr>
      <th colspan="6"> <h1> Criar uma ação</h1> </th>
    </tr>
   <tr>
     <td>C&oacute;digo:</td>
     <td colspan="5"><input type="text" name="codigo" value="" size="100%"></td>
   </tr>
   <tr>
     <td>Nome:</td>
     <td colspan="5"><input type="text" name="nome" value="" size="100%"></td>
   </tr>
   <tr>
     <td>SubNome:</td>
     <td colspan="5"><input type="text" name="subnome" value="" size="100%"></td>
   </tr>
   <tr>
     <td>Releva:</td>
     <td>artigo 5 &nbsp;
     <select name="artigo5[]" multiple="multiple" title="Artigo 5" size="4"  >
     <?php
     for($n=0;$n<mysqli_num_rows($registos_grupos);$n=$n+1) {
     $codigo = mysqli_result($registos_grupos,$n,'codigo');
     $id = mysqli_result($registos_grupos,$n,'id_grupos');
     $nome = mysqli_result($registos_grupos,$n,'nome');   ?>
          <option value="<?php echo $id ?>"><?php echo $codigo."|".$nome; ?></option>
     <?php } ?>
     </select>
     </td>
     <td>artigo 14 &nbsp;
      <select name="artigo14[]" multiple="multiple" title="Artigo 14" size="4"  >
     <?php
     for($n=0;$n<mysqli_num_rows($registos_grupos);$n++) {
     $codigo = mysqli_result($registos_grupos,$n,'codigo');
     $id = mysqli_result($registos_grupos,$n,'id_grupos');
     $nome = mysqli_result($registos_grupos,$n,'nome');   ?>
          <option value="<?php echo $id; ?>"><?php echo $codigo."|".$nome; ?></option>
     <?php } ?>
     </select>
     </td>
     <td>Destinatários:</td>
     <td colspan="2">
     <select name="something" >
          <option value="destinatiros">Docente</option>
          <option value="destinaratios">Não Docente</option>
     </select>
     </td>

   </tr>
   <tr>
     <td>&Aacute;rea</td>
     <td colspan="3">
     <select name="area"   >
     <?php
     for($n=0;$n<mysqli_num_rows($registos_area_formacao);$n=$n+1) {
     $codigo = mysqli_result($registos_area_formacao,$n,'codigo');
     $id = mysqli_result($registos_area_formacao,$n,'id_area_formacao');
     $nome = mysqli_result($registos_area_formacao,$n,'nome');   ?>
          <option value="<?php echo $id ?>"><?php echo $codigo."|".$nome; ?></option>
     <?php } ?>
     </select>
     </td>
     <td>Modalidade</td>
     <td>
  <select name="modalidade">
     <?php
     for($n=0;$n<mysqli_num_rows($registos_modalidade);$n=$n+1) {
     $id = mysqli_result($registos_modalidade,$n,'id_modalidade');
     $nome = mysqli_result($registos_modalidade,$n,'nome');   ?>
          <option value="<?php echo $id ?>"><?php echo $nome; ?></option>
     <?php } ?>
     </select>
     </td>
   </tr>
   <tr>
     <td>Dura&ccedil;&atilde;o (Horas)</td>
     <td><input type="text" name="total"  size="1"></td>
     <td align="right">Presencial:</td>
     <td><input type="text" name="presen"  size="1"></td>
     <td>N&atilde;o presencial</td>
     <td><input type="text" name="npresen"  size="1"></td>
   </tr>
   <tr>
     <td align="char">Avaliação:</td>
     <td colspan="3"><textarea rows="1" cols="45" name="avaliacao" form="acao"></textarea></td>
     <td>Cr&eacute;ditos</td>
     <td> <input type="text" name="nome"  readonly="readonly"></td>
   </tr>
   <tr>
     <td>Observa&ccedil;&otilde;es</td>
     <td colspan="5"><textarea rows="1" cols="45" name="observacao" form="acao"></textarea></td>
   </tr>
   <tr>
     <td align="char" >Data da proposta</td>
     <td ><input type="text" id="datepicker1" name="data_prop"></td>
     <td colspan="2" > </td>
   </tr>
   <tr>
     <td>Data de acreditação</td>
     <td colspan="1"><input type="text" id="datepicker2" name="data_acreditacao"></td>
     <td align="char" >Data de validade</td>
     <td ><input type="text" id="datepicker3" name="data_validade"></td>
     <td colspan="2" > </td>
   </tr>
   <tr>
   <td>Formadores &nbsp;
    <select name="artigo14[]" multiple="multiple" title="Artigo 14" size="4"  >
   <?php
   $area=$_POST['area'];
   echo $area;

   $registos_formadores=mysqli_query(con(),"SELECT * FROM dominio_formacacao_formador WHERE id_dominio_formacao='$area' ;");
   for($n=0;$n<mysqli_num_rows($registos_formadores);$n++) {
     echo $n;
   $id_formando = mysqli_result($registos_formadores,$n,'id_formador');
   $registos_formandos=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando' ;");
   $nome = mysqli_result($registos_formandos,0,'nome'); ?>
        <option value="<?php echo $id_formando; ?>"><?php echo $nome; ?></option>
   <?php } ?>
   </select>
   </td>
   <td>
   <input type=submit class="botao2" Value="Inserir">
 </td>
</tr>
  </table>
<?php } ?>
</div>
</div>
 </body>
 </html>
