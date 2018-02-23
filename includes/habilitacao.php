<?php
include ('funcao_menu.php');
$registo_cfp=mysqli_query(con(),"SELECT * FROM habilitacao ORDER BY id_habilitacao");
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
   <th text-align="center"> <font size="5">Habilitações</font> </th>
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
  </tr>
  <?php for($i=0;$i<mysqli_num_rows($registo_cfp);$i++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_cfp,$i,'id_habilitacao');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $nome=mysqli_result($registo_cfp,$i,'nome');
  echo $nome;
  ?>
  </td>
  <td><a href="habilitacao_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="habilitacao_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <table>
  <tr>
  <td><a href="habilitacao_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
  </table>
</div>
</body>
</html>
