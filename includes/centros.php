<?php
include ('funcao_menu.php');
$registo_cfp=mysqli_query(con(),"SELECT * FROM cfp ORDER BY id_cfp");
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
   <table alling="right"  width="100%" border="0">
   <tr>
   <th text-align="center"> <font size="5">Centros de formacão de professoress</font> </th>
   </tr>
   </table>
</div>
 </head>
 <body>
<div class="corpo">
  <style>
  table {
      border-collapse: collapse;
      width: 97%;
      font-family: "verdana"
  }
  tr:nth-child(even){background-color: #D1F9B3}

  tr{
      font-size:small;
  }
  </style>
  <table align="right" width="100%">
  <tr>
    <th><b>Id &nbsp</b></th>
    <th><b>Nome &nbsp</b></th>
    <th><b>Morada &nbsp</b></th>
    <th><b>Contacto &nbsp</b></th>
    <th><b>Email &nbsp</b></th>
    <th><b>Editar &nbsp</b></th>
    <th><b>Eliminar &nbsp</b></th>
  </tr>
  <?php for($i=0;$i<mysqli_num_rows($registo_cfp);$i++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_cfp,$i,'id_cfp');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $nome=mysqli_result($registo_cfp,$i,'nome');
  echo $nome;
  ?>
  </td>
  <td>
  <?php
  $morada=mysqli_result($registo_cfp,$i,'morada');
  echo $morada;
  ?>
  </td>
  <td>
  <?php
  $contacto=mysqli_result($registo_cfp,$i,'contacto');
  echo $contacto;
  ?>
  </td>
  <td>
  <?php
  $email=mysqli_result($registo_cfp,$i,'email');
  echo $email;
  ?>
  </td>
  <td><a href="centros_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="centros_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <table>
  <tr>
  <td><a href="centros_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
  </table>
</div>
</body>
</html>
