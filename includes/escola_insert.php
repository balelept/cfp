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
   <th text-align="center"> <font size="5">Escolas</font> </th>
   </tr>
   </table>
</div>
 </head>

<div class="corpo">
<?php
$fase = $_GET['i'];
$registo_agru=mysqli_query(con(),"SELECT * FROM agrupamento ORDER BY id_agrupamento;");

 if($fase=="1"){
?>
<form method="post" action="escola_insert.php?i=2">

<table border="1" align="center">
     <tr>
        <td align="left">Escola: </td>
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
    <td align="left">Agrupamento: </td>
    <td align="left" colspan="2">
    <select name="agru" title="agru"  >
    <?php for($m=0;$m<mysqli_num_rows($registo_agru);$m++){?>
         <option value="<?php echo mysqli_result($registo_agru, $m,'id_agrupamento'); ?>"><?php echo mysqli_result($registo_agru, $m,'nome');    ?></option>
     <?php } ?>  </select>
    </td>


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
  $id_agru        =$_POST['agru'];
  $insert = "INSERT INTO escola (id_escola,nome,id_agrupamento,morada,contacto,email) VALUES ( '$id','$nome','$id_agru','$morada','$contacto','$email')";
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
<form action="escola.php" method="post">
  <input type=submit class="botao2" Value="Ok">
</form>
</td>
</table>
<?php
}
?>
