
<html>
<head>
<?php
include ('funcao_menu.php');
$id=$_GET['id'];
$query="SELECT * FROM formando WHERE id_formando='$id'";
$registo_esco=mysqli_query(con(),"SELECT * FROM escola ORDER BY id_escola;");
$registo_habi=mysqli_query(con(),"SELECT * FROM habilitacao ORDER BY id_habilitacao;");
$registo_esca=mysqli_query(con(),"SELECT * FROM escalao ORDER BY id_escalao;");
$registos_grupos=mysqli_query(con(),"SELECT * FROM grupos ORDER BY id_grupos ;");
$for_grupo=mysqli_query(con(),"SELECT * FROM formando_grupo WHERE id_formando='$id'");
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
     <td>escola:</td><td><select name="esco">
    <?php
         for($m=0;$m<mysqli_num_rows($registo_esco);$m++){
    ?>
    <option value="<?php echo $row['id_escola']?>" <?php if($row['id_escola'] ==  mysqli_result($registo_esco, $m,'id_escola')) {echo ("selected");} ?> ><?php echo mysqli_result($registo_esco, $m,'nome'); ?></option>
    <?php } ?> </td>
     </tr>
     <tr>
     <td>Contacto:</td>
     <td><?php $contacto = $row['telemovel'];?>
    <input type="text" name="contacto"  value="<?php echo $contacto?>" >
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
    <option value="<?php echo $row['id_escalao']?>" <?php if($row['id_escalao'] ==  mysqli_result($registo_esca, $m,'id_escalao')) {echo ("selected");} ?> ><?php echo mysqli_result($registo_esca, $m,'indice'); ?></option>
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
     <td><?php $email = $row['e_mail'];?>
    <input type="text" name="email"  value="<?php echo $email?>" >
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
     <td><?php $nif = $row['contribuinte'];?>
    <input type="text" name="nif"  value="<?php echo $nif?>" >
    </td>
     </tr>
     <tr>
     <td>Horas:</td>
     <td><?php $horas = $row['horas'];?>
    <input type="text" name="horas"  value="<?php echo $horas?>" >
    </td>
     </tr>
     <tr>
     <td align="left">Genero: </td>
     <?php $genero = $row['genero'];?>
     <td align="left" colspan="2">
     <select name="genero" title="genero"  >
         <option>--Selecionar Genero--</option>
         <option value="Masculino" <?php if($genero=="Masculino") { echo "selected"; } ?>>Masculino</option>
         <option value="Feminino" <?php if($genero=="Feminino") { echo "selected"; } ?>>Feminino</option>
     </select>
     </td>
     </tr>
     <tr>
     <td align="left">Grupos</td>
     <td><select name="grupo[]" multiple="multiple" title="Grupos" size="4"  >
       <?php
       for($n=0;$n<mysqli_num_rows($registos_grupos);$n=$n+1) {
       $codigo = mysqli_result($registos_grupos,$n,'codigo');
       $id = mysqli_result($registos_grupos,$n,'id_grupos');
       $nome = mysqli_result($registos_grupos,$n,'nome');   ?>
            <option value="<?php echo $id ?>"
              <?php for($i=0;$i<mysqli_num_rows($for_grupo);$i=$i+1){
                $id1 = mysqli_result($for_grupo,$i,'id_grupo');
                if($id==$id1){ echo "selected"; }
              }
                ?>><?php echo $codigo."|".$nome; ?></option>
       <?php } ?>
     </select>
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

  $nome          =$_POST['nome'];
  $id_esco        =$_POST['esco'];
  $contacto      =$_POST['contacto'];
  $id_habi        =$_POST['habi'];
  $id_esca        =$_POST['esca'];
  $morada        =$_POST['morada'];
  $cod_postal        =$_POST['cod_postal'];
  $anos_servico        =$_POST['anos_servico'];
  $email         =$_POST['email'];
  $cc         =$_POST['cc'];
  $nif         =$_POST['nif'];
  $horas         =$_POST['horas'];
  $genero         =$_POST['genero'];

          ?>
           <table align="center">
           <tr>

              <?php
              $a="formando.php";
                  $editar = "UPDATE formando SET nome='$nome',id_esco='$id_esco',id_habi='$id_habi',email='$email',contacto='$contacto',morada='$morada',cod_postal='$cod_postal',anos_servico='$anos_servico',cc='$cc',nif='$nif',horas='$horas',genero='$genero' WHERE id_formando='$id'";
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
