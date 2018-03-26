
<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM formando WHERE id_formando='$id'";
$registo_esco=mysqli_query(con(),"SELECT * FROM escola ORDER BY id_escola;");
$registo_habi=mysqli_query(con(),"SELECT * FROM habilitacao ORDER BY id_habilitacao;");
$registo_esca=mysqli_query(con(),"SELECT * FROM escalao ORDER BY id_escalao;");
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
if($_GET['e']==1) { ?>
<table align="center">

<?php
while($row = mysqli_fetch_assoc($registo))
    {
     ?>
     <form method="post" action="formando_edit.php?e=2&id=<?php echo $id ?>">
     <tr>
     <td>ID do Formando: </td>
     <td><?php $id = $row['id_formando'];?>
     <input type="text" name="id"  value="<?php echo $id?>" readonly="readonly">
     </td>
     </tr>
      <tr>
     <td>Nome:</td>
      <td><?php $nome = $row['nome'];?>
     <input type="text" name="nome"  value="<?php echo $nome?>" >
     </td>
     </tr>
     <tr>
     <td>escola:</td><td><select name="agru">
    <?php
         for($m=0;$m<mysqli_num_rows($registo_esco);$m++){
    ?>
    <option value="<?php echo $row['id_escola']?>" <?php if($row['id_escola'] ==  mysqli_result($registo_esco, $m,'id_escola')) {echo ("selected");} ?> ><?php echo mysqli_result($registo_esco, $m,'nome'); ?></option>
    <?php } ?> </td>
     </tr>
     <tr>
     <td>Contacto:</td>
     <td><?php $contacto = $row['telemovel'];?>
    <input type="text" name="telemovel"  value="<?php echo $contacto?>" >
    </td>
     </tr>
     <tr>
       <td>Habilitação:</td><td><select name="habi">
    <?php
         for($m=0;$m<mysqli_num_rows($registo_habi);$m++){
    ?>
    <option value="<?php echo $row['id_habilitacao']?>" <?php if($row['id_habilitacao'] ==  mysqli_result($registo_habi, $m,'id_habilitacao')) {echo ("selected");} ?> ><?php echo mysqli_result($registo_habi, $m,'nome'); ?></option>
    <?php } ?> </td>
     </tr>
     <tr>
       <td>Escalão:</td><td><select name="esca">
    <?php
         for($m=0;$m<mysqli_num_rows($registo_esca);$m++){
    ?>
    <option value="<?php echo $row['id_escalao']?>" <?php if($row['id_escalao'] ==  mysqli_result($registo_escalao, $m,'id_escalao')) {echo ("selected");} ?> ><?php echo mysqli_result($registo_esca, $m,'indice'); ?></option>
    <?php } ?> </td>
     </tr>
     <tr>
     <td>Morada:</td>
     <td><?php $morada = $row['morada'];?>
    <input type="text" name="morada"  value="<?php echo $morada?>" >
    </td>
     </tr>
     <tr>
     <td>Código Postal:</td>
     <td><?php $cod_postal = $row['cod_postal'];?>
    <input type="text" name="cod_postal"  value="<?php echo $cod_postal?>" >
    </td>
     </tr>
     <tr>
     <td>Anos de Serviço:</td>
     <td><?php $anos_servico = $row['anos_servico'];?>
     <input type="text" name="anos_servico"  value="<?php echo $anos_servico?>" >
     </td>
     </tr>
     <tr>
     <td>Email:</td>
     <td><?php $e_mail = $row['e_mail'];?>
    <input type="text" name="e_mail"  value="<?php echo $e_mail?>" >
    </td>
     </tr>
     <tr>
     <td>Cartão de Cidadão:</td>
     <td><?php $cc = $row['cc'];?>
    <input type="text" name="cc"  value="<?php echo $cc?>" >
    </td>
     </tr>
     <tr>
     <td>NIF:</td>
     <td><?php $contribuinte = $row['contribuinte'];?>
    <input type="text" name="contribuinte"  value="<?php echo $contribuinte?>" >
    </td>
     </tr>
     <tr>
     <td>Horas:</td>
     <td><?php $horas = $row['horas'];?>
    <input type="text" name="horas"  value="<?php echo $horas?>" >
    </td>
     </tr>

       <tr>
    <td colspan="2" align="center"><input type="submit" class="botao2" value="Editar a escola" name="btn-signup">  </td>
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
  $agru    =$_POST['agru'];

          ?>
           <table align="center">
           <tr>

              <?php
              $a="centros.php";
                  $editar = "UPDATE escola SET nome='$nome',email='$email',contacto='$contacto',morada='$morada' ,id_agrupamento='$agru' WHERE id_esola='$id'";
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
