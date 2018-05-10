<?php
include ('funcao_menu.php');
$registo_formando=mysqli_query(con(),"SELECT * FROM formando ORDER BY id_formando");
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
   <th text-align="center"> <font size="5">Formandos</font> </th>
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
    <th>
      <form action="formando.php" method="post">
        Pesquisar: <input type="text" name="term" />
        <input type="submit" value="Pesquisar" />
      </form>
    </th>
  </tr>
  <tr>
    <th><b>Id &nbsp</b></th>
    <th><b>Nome &nbsp</b></th>
    <th><b>Cartão do Cidadão &nbsp</b></th>
    <th colspan="3"></th>
  </tr>
  <?php
    if (!empty($_REQUEST['term'])) {

    $term = ($_REQUEST['term']);

    $pesquisa = mysqli_query(con(),"SELECT * FROM formando WHERE nome LIKE '%".$term."%'");

     for($i=0;$i<mysqli_num_rows($pesquisa);$i++){
    ?>
    <tr>
    <td>
    <?php
    $id =mysqli_result($pesquisa,$i,'id_formando');
    echo $id;
    ?>
    </td>
    <td>
    <?php
    $nome=mysqli_result($pesquisa,$i,'nome');
    ?>
    <a href="formando_perfil.php?id=<?php echo $id ?>"><?php echo $nome ?></a>
    </td>
    <td>
    <?php
    $cc=mysqli_result($pesquisa,$i,'cc');
    echo $cc;
    ?>
    </td>
    <td><a href="formador_insert.php?i=1&id=<?php echo $id ?>"><img src="formador.ico" width="16px" height="16px"> </td>
     <td><a href="formando_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
     <td><a href="formando_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
     </tr>
<?php
    }
  }
  else {
 for($i=0;$i<mysqli_num_rows($registo_formando);$i++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_formando,$i,'id_formando');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $nome=mysqli_result($registo_formando,$i,'nome');
  ?>
  <a href="formando_perfil.php?id=<?php echo $id ?>"><?php echo $nome ?></a>
  </td>
  <td>
  <?php
  $cc=mysqli_result($registo_formando,$i,'cc');
  echo $cc;
  ?>
  </td>
 <td><a href="formador_insert.php?i=1&id=<?php echo $id ?>"><img src="formador.ico" width="16px" height="16px"> </td>
  <td><a href="formando_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="formando_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
}
}
  ?>
  </table>
  <table>
  <tr>
  <td><a href="formando_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
  </table>
</div>
</body>
</html>
