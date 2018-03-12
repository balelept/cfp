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
      <input type="text" name="escola"  value="<?php echo $esco?>" readonly="readonly">
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
     <td>Email da escola:</td>
      <td><?php $email = $row['nome'];?>
     <input type="text" name="email"  value="<?php echo $email?>" readonly="readonly">
     </td>
   </tr>
   <tr>
     <td>Morada da escola:</td>
      <td><?php $morada = $row['nome'];?>
     <input type="text" name="morada"  value="<?php echo $morada?>" readonly="readonly">
     </td>
   </tr>
   <tr>
     <td>Contacto da escola:</td>
      <td><?php $contacto = $row['nome'];?>
     <input type="text" name="contacto"  value="<?php echo $contacto?>" readonly="readonly">
     </td>
   </tr>
<tr>
  <td>Agrupamento da escola:</td>
   <td>
   <?php
   $registo_agru=mysqli_query(con(),"SELECT * FROM escola WHERE id_escola='$id'");
   $agru=mysqli_result($registo_agru,0,'id_agrupamento');
   $agru=mysqli_query(con(),"SELECT * FROM agrupamento WHERE id_agrupamento='$agru'");
   $agru=mysqli_result($agru,0,'nome');
   echo $agru;
   ?>
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
     $a="escola.php";
     $apagar = "DELETE FROM escola WHERE id_escola='$id'";
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
