<?php
include ('funcao_menu.php');
$pagina=$_GET['pagina'];
if (!empty($_REQUEST['term'])) {
  $term = ($_REQUEST['term']);

$registo_formando = mysqli_query(con(),"SELECT * FROM formando WHERE nome LIKE '%".$term."%'");
} else if(isset($_GET['pesquisa'])){
  $term=($_REQUEST['pesquisa']);
  $registo_formando = mysqli_query(con(),"SELECT * FROM formando WHERE nome LIKE '%".$term."%'");
} else {
$registo_formando=mysqli_query(con(),"SELECT * FROM formando ORDER BY id_formando");
}
$pagina=$_GET['pagina'];
$numero=($pagina-1)*3;
$num_reg=mysqli_num_rows($registo_formando)*$pagina;
if(mysqli_num_rows($registo_formando)>3+$numero) { $i=3 ;}
else $i=mysqli_num_rows($registo_formando);
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

  <style>
   #customers2 table {
      width: 97%;
      font-family: "verdana"
  }
  #customers2 tr:nth-child(even){background-color: #D1F9B3}

  #customers2 tr{
      font-size:small;
  }
  </style>

      <style>
      #customers table {
         width: 97%;
         font-family: "verdana"
     }
     #customers tr:nth-child(even){background-color: #D1F9B3}

     #customers tr{
         font-size:small;
     }
  #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 97%;

  }

  #customers td, #customers th {
      border: 0.5px solid #ddd;
      padding: 8px;
      font-size: 110%;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #4CAF50;
      color: white;
  }
  </style>
  <div class="corpo">
  <table align="right" width="100%" id="customers">
  <tr>
    <th>
      <form action="formando.php?pagina=1" method="post">
        Pesquisar: <input type="text" name="term" />
   <input type="submit" value="Pesquisar" />
      </form>
    </th>
  </tr>
  <tr>
    <th><b>Id &nbsp</b></th>
    <th><b>Nome &nbsp</b></th>
    <th><b>Cartão do Cidadão &nbsp</b></th>
    <th></th>
    <th>Editar</th>
    <th>Apagar</th>
  </tr>
  <?php
  for($m=$numero;$m<$i;$m++)
   for($m=$numero;$m<$i;$m++){
  ?>
  <tr>
  <td>
  <?php
  $id =mysqli_result($registo_formando,$m,'id_formando');
  echo $id;
  ?>
  </td>
  <td>
  <?php
  $nome=mysqli_result($registo_formando,$m,'nome');
  ?>
  <a href="formando_perfil.php?id=<?php echo $id ?>"><?php echo $nome ?></a>
  </td>
  <td>
  <?php
  $cc=mysqli_result($registo_formando,$m,'cc');
  echo $cc;
  ?>
  </td>
 <td><a href="formador_insert.php?i=1&id=<?php echo $id ?>"><img src="formador.ico" width="16px" height="16px"> </td>
  <td><a href="formando_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
  <td><a href="formando_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
  </tr>
  <?php
}
  ?>
  </table>
  <table id="customers2">
  <tr>
  <td><a href="formando_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
  </table>
</div>
<div class="fixed">
    <table border="0" align="right" >
    <tr><td align="center"> <b>&nbsp  Página &nbsp</b>  </td></tr>
    <tr><td  align="center">
   <?php if($pagina<=1){?> <img src="menos1.png"><?php
   } else {
     if(isset($term)){
       ?> <a href="formando.php?pagina=<?php echo $pagina-1; ?>&pesquisa=<?php echo $term; ?>"><img src="menos1.png"></a><?php
     } else {
        ?> <a href="formando.php?pagina=<?php echo $pagina-1; ?>"><img src="menos1.png"></a><?php }

    } ?>
    <font size="6" color="blue"><b>&nbsp&nbsp<?php echo $pagina ?> &nbsp</b> </font>
  <?php if($i<3+$numero ){ ?>  <img src="mais1.png"> <?php 
  } else {
     if(isset($term)){
    ?> <a href="formando.php?pagina=<?php echo $pagina+1; ?>&pesquisa=<?php echo $term; ?>"><img src="mais1.png"></a> <?php
  } else {
    ?> <a href="formando.php?pagina=<?php echo $pagina+1; ?>&pesquisa=<?php echo $term; ?>"><img src="mais1.png"></a> <?php }
    } ?>
    </td></tr>
</table>
</div>
</body>
</html>
