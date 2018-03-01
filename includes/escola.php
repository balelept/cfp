<?php
include ('funcao_menu.php');
$registo_escola=mysqli_query(con(),"SELECT * FROM escola ORDER BY id_escola");
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
   <th text-align="center"> <font size="5">Escolas</font> </th>
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
    <th><b>Agrupamento &nbsp</b></th>
    <th><b>Editar &nbsp</b></th>
    <th><b>Eliminar &nbsp</b></th>
  </tr>
  <?php for($i=0;$i<mysqli_num_rows($registo_escola);$i++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_escola,$i,'id_escola');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $nome=mysqli_result($registo_escola,$i,'nome');
  echo $nome;
  ?>
  </td>
  <td>
  <?php
  $morada=mysqli_result($registo_escola,$i,'morada');
  echo $morada;
  ?>
  </td>
  <td>
  <?php
  $contacto=mysqli_result($registo_escola,$i,'contacto');
  echo $contacto;
  ?>
  </td>
  <td>
  <?php
  $email=mysqli_result($registo_escola,$i,'email');
  echo $email;
  ?>
  </td>
  <td>
  <?php
  $agru=mysqli_result($registo_escola,$i,'id_agrupamento');
  $agru=mysqli_query(con(),"SELECT * FROM agrupamento WHERE id_agrupamento='$agru'");
  $agru=mysqli_result($agru,0,'nome');
  echo $agru;
  ?>
  </td>
  <td><a href="escola_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="escola_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <table>
  <tr>
  <td><a href="escola_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
  </table>
</div>
</body>
</html>
