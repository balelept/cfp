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
   <th text-align="center"> <font size="5">Centros de formacão de professoress</font> </th>
   </tr>
   </table>
</div>
 </head>

<div class="corpo">
<?php
$fase = $_GET['i'];
 if($fase=="1"){
?>
<form method="post" action="centros_insert.php?i=2">

<table border="1" align="center">
     <tr>
        <td align="left">Centro de formação de professores: </td>
        <td align="left"><input type="text" name="nome"></td>
    </tr>
         <tr>
        <td align="left">Morada: </td>
        <td align="left"><input type="text" name="morada"></td>
    </tr>
    <tr>
      <td align="left">Contacto: </td>
      <td align="left"><input type="text" name="contacto"></td>
    </tr>
    <tr>
      <td align="left">Email: </td>
      <td align="left"><input type="text" name="email"></td>
    </tr>


 <tr><td colspan="2">
<input type="submit" class="botao2" value="Inserir">
</td></tr>
</table>
</form>
<?php

}else if ($fase=="2"){

  $id            ="";
  $nome          =$_POST['nome'];
  $morada        =$_POST['morada'];
  $contacto      =$_POST['contacto'];
  $email         =$_POST['email'];
  $insert = "INSERT INTO cfp (id_cfp,nome,morada,contacto,email) VALUES ( '$id','$nome','$morada','$contacto','$email')";
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
<form action="centros.php" method="post">
  <input type=submit class="botao2" Value="Ok">
</form>
</td>
</table>
<?php
}
?>
