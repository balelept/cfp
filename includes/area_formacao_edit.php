<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM area_formacao WHERE id_area_formacao='$id'";
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
<td align="center" bgcolor="#F08143"><font size="6" color="white">Área de formaçao</font></td>
</tr>
</table>
<br>
<?php
if($_GET['e']==1) { ?>
<table align="center">

<?php
while($row = mysqli_fetch_assoc($registo))
    {
     ?>
     <form method="post" action="area_formacao_edit.php?e=2&id=<?php echo $id ?>">
     <tr>
     <td>ID da área de formacao: </td>
     <td><?php $id = $row['id_area_formacao'];?>
     <input type="text" name="id"  value="<?php echo $id?>" readonly="readonly">
     </td>
     </tr>
      <tr>
     <td>Codigo:</td>
      <td><?php $codigo = $row['codigo'];?>
     <input type="text" name="codigo"  value="<?php echo $codigo?>" >
     </td>
     </tr>
     <tr>
    <td>Nome:</td>
     <td><?php $nome = $row['nome'];?>
    <input type="text" name="nome"  value="<?php echo $nome?>" >
    </td>
    </tr>
       <tr>
    <td colspan="2" align="center"><input type="submit" class="botao2" value="Editar área" name="btn-signup">  </td>
    </tr>
          </form>
     <?php
    }?>



</table>
<?php } else {


  $nome       =$_POST['nome'];
  $codigo      =$_POST['codigo'];

    ?>
     <table align="center">
     <tr>

        <?php
        $a="area_formacao.php";
        $editar = "UPDATE area_formacao SET nome='$nome', codigo='$codigo' WHERE id_area_formacao='$id'";
        $result = mysqli_query(con(),$editar) or die(mysqli_error(con()));
          if($result){

      ?> <td>  Registo editado com sucesso </td>
      <td>  <a href=<?php echo $a ?> class="voltar">Voltar</a> </td>
      <?php
     }else{
        ?>
        <td>  Registo nao foi editado </td>
        <td>  <a href=<?php echo $a ?> class="voltar">Voltar</a> </td><?php


     }
     ?>
     </tr>
     </table>

<?php } ?>
</div>
</body>
</html>
