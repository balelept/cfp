
<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM modalidade WHERE id_modalidade='$id'";
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
<td align="center" bgcolor="#F08143"><font size="6" color="white">Modalidades</font></td>
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
     <form method="post" action="modalidade_edit.php?e=2&id=<?php echo $id ?>">
     <tr>
     <td>ID da modalidade: </td>
     <td><?php $id = $row['id_modalidade'];?>
     <input type="text" name="id"  value="<?php echo $id?>" readonly="readonly">
     </td>
     </tr>
      <tr>
     <td>Modalidade:</td>
      <td><?php $nome = $row['nome'];?>
     <input type="text" name="nome"  value="<?php echo $nome?>" >
     </td>
     </tr>
       <tr>
    <td colspan="2" align="center"><input type="submit" class="botao2" value="Editar Modalidade" name="btn-signup">  </td>
    </tr>
          </form>
     <?php
    }?>



</table>
<?php } else {


  $nome       =$_POST['nome'];

    ?>
     <table align="center">
     <tr>

        <?php
        $a="modalidade.php";
        $editar = "UPDATE modalidade SET nome='$nome' WHERE id_modalidade='$id'";
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
