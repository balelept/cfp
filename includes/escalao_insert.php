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
   <th text-align="center"> <font size="5">Escalões</font> </th>
   </tr>
   </table>
</div>
 </head>

<div class="corpo">
<?php
$fase = $_GET['i'];
 if($fase=="1"){
?>
<form method="post" action="escalao_insert.php?i=2">

<table border="1" align="center">
      <tr>
         <td align="left">Escalaão: </td>
         <td align="left"><input type="number" name="id"></td>
     </tr>
     <tr>
        <td align="left">Indice: </td>
        <td align="left"><input type="number" name="indice"></td>
    </tr>

 <tr><td colspan="2">
<input type="submit" class="botao2" value="Inserir">
</td></tr>
</table>
</form>
<?php

}else if ($fase=="2"){

  $id              =$_POST['id'];
  $indice          =$_POST['indice'];
  $insert = "INSERT INTO escalao (id_escalao,indice) VALUES ( '$id','$indice')";
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
<form action="escalao.php" method="post">
  <input type=submit class="botao2" Value="Ok">
</form>
</td>
</table>
<?php
}
?>
