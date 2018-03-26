<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM formando WHERE id_formando='$id'";
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
<td align="center" bgcolor="#F08143"><font size="6" color="white">Formandos</font></td>
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
     <form method="post" action="formando_delete.php?d=2&id=<?php echo $id ?>">
     <tr>
     <td>ID: </td>
     <td><?php $id = $row['id_formando'];?>
     <input type="text" name="id"  value="<?php echo $id?>" readonly="readonly">
     </td>
     </tr>
      <tr>
     <td>Nome:</td>
      <td><?php $nome = $row['nome'];?>
     <input type="text" name="nome"  value="<?php echo $nome?>" readonly="readonly">
     </td>
   </tr>
   <tr>
     <td>Escola:</td>
      <td>
      <?php
      $registo_esco=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id'");
      $esco=mysqli_result($registo_esco,0,'id_escola');
      $esco=mysqli_query(con(),"SELECT * FROM escola WHERE id_escola='$esco'");
      $esco=mysqli_result($esco,0,'nome');
      ?>
      <input type="text" name="escola"  value="<?php echo $esco?>" readonly="readonly">
      </td>
      </tr>
      <tr>
     <td>Contacto:</td>
      <td><?php $contacto = $row['telemovel'];?>
     <input type="text" name="contacto"  value="<?php echo $contacto?>" readonly="readonly">
     </td>
   </tr>
   <tr>
     <td>Habilitação:</td>
      <td>
      <?php
      $registo_habi=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id'");
      $habi=mysqli_result($registo_habi,0,'id_habilitacao');
      $habi=mysqli_query(con(),"SELECT * FROM habilitacao WHERE id_habilitacao='$habi'");
      $habi=mysqli_result($habi,0,'nome');
      ?>
      <input type="text" name="habilitacao"  value="<?php echo $habi?>" readonly="readonly">
      </td>
      </tr>
      <tr>
        <td>Escalão:</td>
         <td>
         <?php
         $registo_esca=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id'");
         $esca=mysqli_result($registo_esca,0,'id_escalao');
         $esca=mysqli_query(con(),"SELECT * FROM escalao WHERE id_escalao='$esca'");
         $esca=mysqli_result($esca,0,'indice');
         ?>
         <input type="text" name="escalao"  value="<?php echo $esca?>" readonly="readonly">
         </td>
         </tr>
   <tr>
     <td>Morada:</td>
      <td><?php $morada = $row['morada'];?>
     <input type="text" name="morada"  value="<?php echo $morada?>" readonly="readonly">
     </td>
   </tr>
   <tr>
     <td>Codigo Postal:</td>
      <td><?php $cod_postal = $row['cod_postal'];?>
     <input type="text" name="cod_postal"  value="<?php echo $cod_postal?>" readonly="readonly">
     </td>
   </tr>
   <tr>
     <td>Anos de Serviço:</td>
      <td><?php $anos_servico = $row['anos_servico'];?>
     <input type="text" name="anos_servico"  value="<?php echo $anos_servico?>" readonly="readonly">
     </td>
   </tr>
<tr>
  <tr>
    <td>Email:</td>
     <td><?php $e_mail = $row['e_mail'];?>
    <input type="text" name="e_mail"  value="<?php echo $e_mail?>" readonly="readonly">
    </td>
  </tr>
  <tr>
    <td>Cartão do Cidadão:</td>
     <td><?php $cc = $row['cc'];?>
    <input type="text" name="cc"  value="<?php echo $cc?>" readonly="readonly">
    </td>
  </tr>
  <tr>
    <td>NIF:</td>
     <td><?php $contribuinte = $row['contribuinte'];?>
    <input type="text" name="contribuinte"  value="<?php echo $contribuinte?>" readonly="readonly">
    </td>
  </tr>
  <tr>
    <td>Horas:</td>
     <td><?php $horas = $row['horas'];?>
    <input type="text" name="horas"  value="<?php echo $horas?>" readonly="readonly">
    </td>
  </tr>
  <tr>
    <td>Genero:</td>
     <td><?php $genero = $row['genero'];?>
    <input type="text" name="genero"  value="<?php echo $genero?>" readonly="readonly">
    </td>
  </tr>
       <tr>
    <td colspan="2" align="center"><input type="submit" class="botao2" value="Apagar centro" name="btn-signup">  </td>
    </tr>
          </form>
     <?php
    }?>



</table>
<?php } else { ?>
  <table align="center">
     <tr><td>
     <?php
     $a="formando.php";
     $apagar = "DELETE FROM formando WHERE id_formando='$id'";
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
