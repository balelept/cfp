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
   <th text-align="center"> <font size="5">Grupos</font> </th>
   </tr>
   </table>
</div>
 </head>

<div class="corpo">
<?php
$fase = $_GET['i'];
 if($fase=="1"){
?>
<form method="post" action="grupos_insert.php?i=2">

<table border="1" align="center">
     <tr>
        <td align="left">Codigo: </td>
        <td align="left"><input type="text" name="codigo"></td>
    </tr>
    <tr>
       <td align="left">Nome: </td>
       <td align="left"><input type="text" name="nome"></td>
   </tr>
 <tr><td colspan="2">
<input type="submit" class="botao2" value="Inserir">
</td></tr>
</table>
</form>
<?php

}else if ($fase=="2"){

  $id            ="";
  $nome         =$_POST['nome'];
  $codigo        =$_POST['codigo'];
  $insert = "INSERT INTO grupos (id_grupos,codigo,nome) VALUES ( '$id','$codigo','$nome')";
  $result = mysqli_query(con(), $insert);
  ?>
 <table border="1" align="center">
<tr>  <?php
  if ($result){
?> <td> <?php  echo "Registo inserido com sucesso";  ?> </td> <?php
} else { ?> <td> <?php echo "Registo não foi inserido";  ?> </td> <?php }
?>
</tr>
<td>
<form action="grupos.php" method="post">
  <input type=submit class="botao2" Value="Ok">
</form>
</td>
</table>
<?php
}
?>
