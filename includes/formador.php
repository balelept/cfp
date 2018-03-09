<?php
include('funcao_menu.php');
$registo_area=mysqli_query(con(),"SELECT * FROM area_formacao ORDER BY id_area_formacao");
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
   <th text-align="center"> <font size="5">Formador</font> </th>
   </tr>
   </table>
</div>
 </head>
 <body>
   <div class="corpo">
     <?php
     $fase=$_GET['i'];
     if($fase=="1"){
         ?>
<table>
 <tr>
<td>Area de formacao &nbsp;
 <select name="area[]" multiple="multiple" title="area de formação" size="4"  >
 <?php
 for($n=0;$n<mysqli_num_rows($registo_area);$n=$n+1) {
 $codigo = mysqli_result($registo_area,$n,'codigo');
 $id = mysqli_result($registo_area,$n,'id_area_formacao');
 $nome = mysqli_result($registo_areaw,$n,'nome');  ?>
      <option value="<?php echo $id ?>"><?php echo $codigo."|".$nome; ?></option>
 <?php } ?>
 </select>

 </td>
 </tr>
 </table>
 <?php
} else if($fase=2) {


  $k=0;
  if(!empty($_POST['area'])) {
     foreach($_POST['area'] as $id_area) {
         $insert = "INSERT INTO dominio_formacao_formador (id_d_f_f,id_dominio_formacao,id_formador) VALUES ( '$id_dff','$id_area','$id')";
         $result5[$k] = mysql_query($insert, $ligacao) or die(mysql_error());
         $k++;
     }
 }


 ?>
<table border="1" align="center">
<tr>  <?php
 if ($result5){
?> <td> <?php  echo "Registo inserido com sucesso";  ?> </td> <?php
} else { ?> <td> <?php echo "Registo nÃ£o foi inserido";  ?> </td> <?php }
?>
</tr>
<td>
<form action="index.php" method="post">
 <input type=submit class="botao2" Value="Ok">
</form>
</td>
</table>
<?php
} ?>
 </div>
</body>
<html>
