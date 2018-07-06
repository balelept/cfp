<?php
include('funcao_menu.php');
$id_edicao=$_GET['id_edicao'];
$registo_edicao=mysqli_query(con(),"SELECT * FROM edicao_formacao WHERE id_edicao='$id_edicao'");
$id_acao=mysqli_result($registo_edicao,0,'id_acao_formacao');
$registo_acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE id_acao_formacao='$id_acao'");
$registo_formador=mysqli_query(con(),"SELECT * FROM edicao_formador WHERE id_edicao='$id_edicao'");

?>
<html>
<head>
  <div class="cabec">

    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<style>
.button {
  background: #33e010;
  background-image: -webkit-linear-gradient(top, #33e010, #cdcfcd);
  background-image: -moz-linear-gradient(top, #33e010, #cdcfcd);
  background-image: -ms-linear-gradient(top, #33e010, #cdcfcd);
  background-image: -o-linear-gradient(top, #33e010, #cdcfcd);
  background-image: linear-gradient(to bottom, #33e010, #cdcfcd);
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  font-family: Arial;
  color: #000000;
  font-size: 24px;
  padding: 12px 22px 12px 22px;
  border: solid #000000 2px;
  text-decoration: none;
}

.button:hover {
  background: #ffffff;
  background-image: -webkit-linear-gradient(top, #ffffff, #cdcfcd);
  background-image: -moz-linear-gradient(top, #ffffff, #cdcfcd);
  background-image: -ms-linear-gradient(top, #ffffff, #cdcfcd);
  background-image: -o-linear-gradient(top, #ffffff, #cdcfcd);
  background-image: linear-gradient(to bottom, #ffffff, #cdcfcd);
  text-decoration: none;
}
.wrapper {
    text-align: center;
}
</style>
     <table alling="right"  width="100%" border="0">
     <tr>
     <th text-align="center"> <font size="5"><?php echo mysqli_result($registo_acao,0,'nome'); ?></font> </th>
     </tr>
     </table>
  </div>
 </head>
 <body>
   <div class="corpo">
<div class="perficenter">
<table border="0" width="100%" id="customers">
<tr>
<th><b>Nome:</b></th>
<td colspan="3"><?php echo mysqli_result($registo_acao,0,'nome'); ?></td>
</tr>
<tr>
<th><b>Data do ínicio:</b></th>
<td><?php echo mysqli_result($registo_edicao,0,'data_inicio'); ?></td>
  <th><b>Data do fim</b></th>
  <td><?php echo mysqli_result($registo_edicao,0,'data_fim'); ?></td>
  </tr>
<tr>
<th><b>Formadores</b></th>
<td colspan="3">
<?php for($x=0;$x<mysqli_num_rows($registo_formador);$x++){
     $id_formador=mysqli_result($registo_formador,$x,'id_formador');
     $registo_formando=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formador'");
    ?> <a href="formando_perfil.php?id=<?php echo $id_formador ;?>"> <?php echo mysqli_result($registo_formando,'0','nome'); ?> </a> <?php echo "  |  ";
}
 ?>
</td>
</tr>
<tr>
<th><b>Numero de turmas</b></th>
<td colspan="3"><?php
$registo_nturmas=mysqli_query(con(),"SELECT DISTINCT id_turma FROM turma WHERE id_edicao_formacao='$id_edicao'");
echo mysqli_num_rows($registo_nturmas);
?></td>
</tr>
</table>
<table border="0" width="100%" >
  <tr>
  <td><div class="wrapper">
    <form method="get" action="centros.php">
      <button class="button" allign="center">formandos inscritos</button>
  </form>
  </div></td>
  <td><div class="wrapper">
    <form method="get" action="centros.php">
      <button class="button" allign="center">Certificados</button>
  </form>
  </div></td>
  <td><div class="wrapper">
    <form method="get" action="centros.php">
      <button class="button" allign="center">Pautas</button>
  </form>
  </div></td>
  <td><div class="wrapper">
    <form method="get" action="centros.php">
      <button class="button" allign="center">Lista de presensasa
      </button>
  </form>
  </div></td>
</tr>
</table>
<?php
$registo_turma=mysqli_query(con(),"SELECT DISTINCT(id_turma) FROM turma WHERE id_edicao_formacao='$id_edicao'");
for($j=0;$j<mysqli_num_rows($registo_turma);$j++){
  ?>
  <div class="<?php echo "edicao_turmas".$j; ?>">
    <?php
    $id_turma=mysqli_result($registo_turma,$j,'id_turma');
    $registo_turma2=mysqli_query(con(),"SELECT * FROM turma WHERE id_turma='$id_turma'");
    ?>
    <table border="0" width="100%" id="customers">
      <tr>
      <th><?php $nturma=$j+1; echo "Turma nº ".$nturma; ?></th>
      <th><?php echo "Nº de formandos".mysqli_num_rows($registo_turma2); ?></th>
      <td>
      <a href="notas_insert.php?i=1&id_turma=<?php echo $id_turma ;?>">  <img src="notas.ico" height="26" width="26"> </a>
    </td>
    <td>
      <a href="pdf_perfil_turma.php?id_turma=<?php echo $id_turma ;?>">  <img src="pauta.ico" height="26" width="26"> </a>
    </td>
    <td>
      <a href="pdf_presencas.php?id_turma=<?php echo $id_turma ;?>">  <img src="pauta.ico" height="26" width="26"></a>
      </td>
      <tr>
    </table>
    <?php
    for($k=0;$k<mysqli_num_rows($registo_turma2);$k++){

    }
    echo "asdas"; ?>
  </div>
  <?php
}
 ?>
</div>
   </div>
</body>
</html>
