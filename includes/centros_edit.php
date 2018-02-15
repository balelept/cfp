
<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM cfp WHERE id_cfp='$id'";
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
<td align="center" bgcolor="#F08143"><font size="6" color="white">Centro de formação</font></td>
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
     <form method="post" action="centros_edit.php?e=2&id=<?php echo $id ?>">
     <tr>
     <td>ID do centro de formaçao: </td>
     <td><?php $id = $row['id_cfp'];?>
     <input type="text" name="id"  value="<?php echo $id?>" readonly="readonly">
     </td>
     </tr>
      <tr>
     <td>Nome do centro de formaçao:</td>
      <td><?php $nome = $row['nome'];?>
     <input type="text" name="nome"  value="<?php echo $nome?>" >
     </td>
     </tr>
     <tr>
     <td>Email do centro de formaçao:</td>
     <td><?php $email = $row['email'];?>
    <input type="text" name="email"  value="<?php echo $email?>" >
    </td>
     </tr>
     <tr>
     <td>Contacto do centro de formaçao:</td>
     <td><?php $contacto = $row['contacto'];?>
    <input type="text" name="contacto"  value="<?php echo $contacto?>" >
    </td>
     </tr>
     <tr>
     <td>Morada do centro de formaçao:</td>
     <td><?php $morada = $row['morada'];?>
    <input type="text" name="morada"  value="<?php echo $morada?>" >
    </td>
     </tr>
       <tr>
    <td colspan="2" align="center"><input type="submit" class="botao2" value="Editar Centro de formacao" name="btn-signup">  </td>
    </tr>
          </form>
     <?php
    }?>



</table>
<?php } else {


  $nome       =$_POST['nome'];
  $email      =$_POST['email'];
  $contacto    =$_POST['contacto'];
  $morada     =$_POST['morada'];



    ?>
     <table align="center">
     <tr>

        <?php
        $a="centros.php";
        $editar = "UPDATE cfp SET nome='$nome',email='$email',contacto='$contacto',morada='$morada' WHERE id_cfp='$id'";
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
