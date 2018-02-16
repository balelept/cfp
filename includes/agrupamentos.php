<?php
include ('funcao_menu.php');
$registo_agru=mysqli_query(con(),"SELECT * FROM agrupamento ORDER BY id_agrupamento");
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
   <th text-align="center"> <font size="5">Agrupamentos</font> </th>
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
    <th><b>Centro &nbsp</b></th>
    <th><b>Editar &nbsp</b></th>
    <th><b>Eliminar &nbsp</b></th>
  </tr>
  <?php for($i=0;$i<mysqli_num_rows($registo_agru);$i++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_agru,$i,'id_agrupamento');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $nome=mysqli_result($registo_agru,$i,'nome');
  echo $nome;
  ?>
  </td>
  <td>
  <?php
  $morada=mysqli_result($registo_agru,$i,'morada');
  echo $morada;
  ?>
  </td>
  <td>
  <?php
  $contacto=mysqli_result($registo_agru,$i,'contacto');
  echo $contacto;
  ?>
  </td>
  <td>
  <?php
  $email=mysqli_result($registo_agru,$i,'email');
  echo $email;
  ?>
  </td>
  <td>
  <?php
  $cfp=mysqli_result($registo_agru,$i,'id_cfp');
  $cfp=mysqli_query(con(),"SELECT * FROM cfp WHERE id_cfp='$cfp'");
  $cfp=mysqli_result($cfp,0,'nome');
  echo $cfp;
  ?>
  </td>
  <td><a href="agrupamentos_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="agrupamentos_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <table>
  <tr>
  <td><a href="agrupamentos_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
  </table>
</div>
</body>
</html>
