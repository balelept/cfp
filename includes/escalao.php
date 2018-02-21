<?php
include ('funcao_menu.php');
$registo_escalao=mysqli_query(con(),"SELECT * FROM escalao ORDER BY id_escalao");
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
   <th text-align="center"> <font size="5">Escalões</font> </th>
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
    <th><b>Indice &nbsp</b></th>
  </tr>
  <?php for($i=0;$i<mysqli_num_rows($registo_escalao);$i++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_escalao,$i,'id_escalao');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $indice=mysqli_result($registo_escalao,$i,'indice');
  echo $indice;
  ?>
  </td>
  <td><a href="escalao_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="escalao_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <table>
  <tr>
  <td><a href="escalao_insert.php?i=1"><img src="add.ico" title="Inserir Escalão"></a> </td>
  </tr>
  </table>
</div>
</body>
</html>
