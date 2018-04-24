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
   <th text-align="center"> <font size="5">Inserir Formando</font> </th>
   </tr>
   </table>
</div>
 </head>

<div class="corpo">
<?php
$fase = $_GET['i'];
$registo_esco=mysqli_query(con(),"SELECT * FROM escola ORDER BY id_escola;");
$registo_habi=mysqli_query(con(),"SELECT * FROM habilitacao ORDER BY id_habilitacao;");
$registo_esca=mysqli_query(con(),"SELECT * FROM escalao ORDER BY id_escalao;");
$registos_grupos=mysqli_query(con(),"SELECT * FROM grupos ORDER BY id_grupos ;");

 if($fase=="1"){
?>
<form method="post" action="formando_insert.php?i=2">

<table border="1" align="center">
     <tr>
        <td align="left">Nome: </td>
        <td align="left"><input type="text" name="nome"></td>
    </tr>
         <tr>
        <td align="left">Escola: </td>
        <td align="left" colspan="2">
        <select name="esco" title="esco"  >
          <option>--Selecionar Escola--</option>
        <?php for($m=0;$m<mysqli_num_rows($registo_esco);$m++){?>
             <option value="<?php echo mysqli_result($registo_esco, $m,'id_escola'); ?>"><?php echo mysqli_result($registo_esco, $m,'nome');    ?></option>
         <?php } ?>  </select>
        </td>
    </tr>
    <tr>
      <td align="left">Contacto: </td>
      <td align="left"><input type="text" name="contacto"></td>
    </tr>
    <tr>
   <td align="left">Habilitação: </td>
   <td align="left" colspan="2">
   <select name="habi" title="habi"  >
     <option>--Selecionar Habilitação--</option>
   <?php for($m=0;$m<mysqli_num_rows($registo_habi);$m++){?>
        <option value="<?php echo mysqli_result($registo_habi, $m,'id_habilitacao'); ?>"><?php echo mysqli_result($registo_habi, $m,'nome');    ?></option>
    <?php } ?>  </select>
   </td>
</tr>
<tr>
<td align="left">Escalão: </td>
<td align="left" colspan="2">
<select name="esca" title="esca"  >
 <option>--Selecionar Escalão--</option>
<?php for($m=0;$m<mysqli_num_rows($registo_esca);$m++){?>
    <option value="<?php echo mysqli_result($registo_esca, $m,'id_escalao'); ?>"><?php echo mysqli_result($registo_esca, $m,'indice');    ?></option>
<?php } ?>  </select>
</td>
</tr>
<tr>
  <td align="left">Morada: </td>
  <td align="left"><input type="text" name="morada"></td>
</tr>
<tr>
  <td align="left">Código Postal: </td>
  <td align="left"><input type="text" name="cod_postal"></td>
</tr>
<tr>
  <td align="left">Anos de Serviço: </td>
  <td align="left"><input type="text" name="anos_servico"></td>
</tr>
<tr>
  <td align="left">E-Mail: </td>
  <td align="left"><input type="text" name="email"></td>
</tr>
<tr>
  <td align="left">Cartão Cidadão: </td>
  <td align="left"><input type="text" name="cc"></td>
</tr>
<tr>
  <td align="left">NIF: </td>
  <td align="left"><input type="text" name="nif"></td>
</tr>
<tr>
  <td align="left">Horas: </td>
  <td align="left"><input type="text" name="horas"></td>
</tr>
<tr>
<td align="left">Genero: </td>
<td align="left" colspan="2">
<select name="genero" title="genero"  >
    <option>--Selecionar Genero--</option>
    <option value="Masculino">Masculino</option>
    <option value="Feminino">Feminino</option>
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
        <option value="<?php echo $id ?>"><?php echo $codigo."|".$nome; ?></option>
   <?php } ?>
 </select>
 </td>
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
  $insert = "INSERT INTO formando (id_formando,nome,id_escola,telemovel,id_habilitacao,id_escalao,morada,cod_postal,anos_servico,e_mail,cc,contribuinte,horas,genero) VALUES ( '$id','$nome','$id_esco','$contacto','$id_habi','$id_esca','$morada','$cod_postal','$anos_servico','$email','$cc','$nif','$horas','$genero')";
  $result = mysqli_query(con(), $insert);


     $result1 = mysqli_query(con(),"SELECT * FROM formando");
     $id_formando=0;
      for($n=0;$n<mysqli_num_rows($result1);$n++) {
        $id_formando2 = mysqli_result($result1, $n, 'id_formando');
        if($id_formando<$id_formando2){
          $id_formando=$id_formando2;
        }
      }

     $k=0;
     if(!empty($_POST['grupo'])) {
       foreach($_POST['grupo'] as $grupo) {
           $insert = "INSERT INTO formando_grupo (id_formando,id_grupo) VALUES ('$id_formando','$grupo')";
           $result5 = mysqli_query(con(), $insert);
           $k++;
       }
     }
  $result1 = mysqli_query(con(),"SELECT * FROM formando");
  $id_formando=0;
   for($n=0;$n<mysqli_num_rows($result1);$n++) {
     $id_formando2 = mysqli_result($result1, $n, 'id_formando');
     if($id_formando<$id_formando2){
       $id_formando=$id_formando2;
     }
   }

  $k=0;
  if(!empty($_POST['grupo'])) {
    foreach($_POST['grupo'] as $grupo) {
        $insert = "INSERT INTO formando_grupo (id_formando,id_grupo) VALUES ('$id_formando','$grupo')";
        $result5 = mysqli_query(con(), $insert);
        $k++;
    }
  }
  ?>
 <table border="1" align="center">
<tr>  <?php
  if ($result){
?> <td> <?php  echo "Registo inserido com sucesso";  ?> </td> <?php
} else { ?> <td> <?php echo "Registo não foi inserido";  ?> </td> <?php }
?>
</tr>
<td>
<form action="formando.php" method="post">
  <input type=submit class="botao2" Value="Ok">
</form>
</td>
</table>
<?php
}
?>
