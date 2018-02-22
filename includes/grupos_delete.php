<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM grupos WHERE id_grupos='$id'";
$registo=mysqli_query(con(),$query);

?>
</head>
<body>
<style>
table {
    border-collapse: collapse;
}
</style>
<div class="display">
<table border="0" align="center" width="100%" >
<tr class="border_bottom">
<td align="center" bgcolor="#F08143"><font size="6" color="white">Grupos</font></td>
</tr>
</table>
<br>
<?php
if($_GET['d']==1) { ?>
<table align="center">

<?php
while($row = mysqli_fetch_assoc($registo))
    {
     ?>
     <form method="post" action="grupos_delete.php?d=2&id=<?php echo $id ?>">
     <tr>
     <td>ID do grupo: </td>
     <td><?php $id = $row['id_grupos'];?>
     <input type="text" name="id"  value="<?php echo $id?>" readonly="readonly">
     </td>
     </tr>
      <tr>
     <td>Nome do grupo:</td>
      <td><?php $nome = $row['nome'];?>
     <input type="text" name="nome"  value="<?php echo $nome?>" readonly="readonly">
     </td>
   </tr>
      <tr>
     <td>codigo do grupo:</td>
      <td><?php $codigo= $row['codigo'];?>
     <input type="text" name="codigo"  value="<?php echo $codigo?>" readonly="readonly">
     </td>
   </tr>
       <tr>
    <td colspan="2" align="center"><input type="submit" class="botao2" value="Apagar Codigo" name="btn-signup">  </td>
    </tr>
          </form>
     <?php
    }?>



</table>
<?php } else { ?>
  <table align="center">
     <tr><td>
     <?php
     $a="grupos.php";
     $apagar = "DELETE FROM grupos WHERE id_grupos='$id'";
     $result = mysqli_query(con(),$apagar) or die(mysqli_error(con()));
          if($result){

                  ?> <td>  Registo apagado com sucesso </td>
                  <td>  <a href=<?php echo $a ?> class="voltar">Voltar</a> </td>
                  <?php
     }else{
       ?>
       <td>  Registo nao foi apagado </td>
       <td>  <a href=<?php echo $a ?> class="voltar">Voltar</a> </td><?php

     }
     ?>
     </td></tr>
     </table>

<?php } ?>
</div>
</body>
</html>
