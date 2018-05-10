<?php
include('funcao_menu.php');
$id_formando=$_GET['id'];
$registo_formando=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando'");
$escalao = mysqli_result($registo_formando,0,'id_escalao');
$registo_escalao=mysqli_query(con(),"SELECT * FROM escalao WHERE id_escalao='$escalao'");
$habili = mysqli_result($registo_formando,0,'id_habilitacao');
$escola = mysqli_result($registo_formando,0,'id_escola');
$registo_formando_grupo=mysqli_query(con(),"SELECT * FROM formando_grupo WHERE id_formado='$id_formando'");
?>
<html>
<head>
  <div class="cabec">
    <style>
    th, td {

        padding: 8px;
    }
    tr:nth-child(even){background-color: #D4D4D4}

    </style>

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
#customers2 {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers2 td, #customers2 th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers2 tr:nth-child(even){background-color: #f2f2f2;}

#customers2 tr:hover {background-color: #ddd;}

#customers2 th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0083ff;
    color: white;
}
</style>
     <table alling="right"  width="97%" border="0">
     <tr>
     <th text-align="center"> <font size="5"><?php  echo  "Formando"; ?></font> </th>
     </tr>
     </table>
  </div>
 </head>
 <body>
   <div class="corpo">
     <div class="perfileft">
<table border="1" width="100%" id="customers">
  <tr>
      <th><b>Nome:</b></th>
      <td colspan="3"><?php echo mysqli_result($registo_formando,0,'nome'); ?></td>
  </tr>
  <tr>
      <th><b>Email:</b></th>
      <td colspan="3"><?php echo mysqli_result($registo_formando,0,'e_mail'); ?></td>
  </tr>
  <tr>
      <th><b>Morada:</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'morada'); ?></td>
      <th><b>Código postal:</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'cod_postal'); ?></td>
  </tr>
  <tr>
      <th><b>Cartão de cidadão:</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'cc'); ?></td>
      <th><b>Nº contribuinte:</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'contribuinte'); ?></td>
  </tr>
  <tr>
      <th><b>Género</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'genero'); ?></td>
      <th><b>Telemovel:</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'telemovel'); ?></td>
  </tr>
  <tr>
      <th><b>Escola</b></th>
      <td><?php
      $escola=mysqli_result($registo_formando,0,'id_escola');
      $registo_escola=mysqli_query(con(),"SELECT * FROM escola WHERE id_escola='$escola'");
      echo mysqli_result($registo_escola,0,'nome');
      ?></td>
      <th><b>Habilitação</b></th>
      <td><?php
      $habi=mysqli_result($registo_formando,0,'id_habilitacao');
      $registo_habi=mysqli_query(con(),"SELECT * FROM habilitacao WHERE id_habilitacao='$habi'");
      echo mysqli_result($registo_habi,0,'nome');
      ?></td>
  </tr>
  <tr>
      <th><b>Escalão</b></th>
      <td><?php
      $escalao=mysqli_result($registo_formando,0,'id_escalao');
      $registo_escalao=mysqli_query(con(),"SELECT * FROM escalao WHERE id_escalao='$escalao'");
      echo mysqli_result($registo_escalao,0,'id_escalao');
      ?></td>
      <th><b>Índice:</b></th>
      <td><?php   echo mysqli_result($registo_escalao,0,'indice'); ?></td>
  </tr>
  <tr>
      <th><b>Anos de serviço</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'anos_servico'); ?></td>
      <th><b>Horas:</b></th>
      <td><?php echo mysqli_result($registo_formando,0,'horas'); ?></td>
  </tr>
  <tr>
  <th><b>Grupos</b></th>
  <td colspan="3"><?php
  $registo_for_gru=mysqli_query(con(),"SELECT * FROM formando_grupo WHERE id_formando='$id_formando'");
  for($g=0;$g<mysqli_num_rows($registo_for_gru);$g++) {
    $id_grupo=mysqli_result($registo_for_gru,$g,'id_grupo');
    $registo_grupo=mysqli_query(con(),"SELECT * FROM grupos WHERE id_grupos='$id_grupo' ORDER BY id_grupos ;");
  $codigo = mysqli_result($registo_grupo,0,'codigo');
  $nome = mysqli_result($registo_grupo,0,'nome');
  echo $codigo."|".$nome."<br>";  } ?></td>
</tr>
</table>
<?php
$registo_formador=mysqli_query(con(),"SELECT * FROM dominio_formacacao_formador WHERE id_formador='$id_formando'");
if(mysqli_num_rows($registo_formador)>0){
  ?><table id="customers2">
    <tr>
    <th colspan="2">
Área de formacao
    </th>
    </tr>
    <tr>
    <?php
  for($n=0;$n<mysqli_num_rows($registo_formador);$n++){
$id_area=mysqli_result($registo_formador,$n,'id_dominio_formacao');
$registo_area=mysqli_query(con(),"SELECT * FROM area_formacao WHERE id_area_formacao='$id_area'");
$nome=mysqli_result($registo_area,0,'nome');
$codigo=mysqli_result($registo_area,0,'codigo');
?><td>
  <?php echo $codigo."  |  ".$nome;  ?>
</td>
  <?php
}
  ?></tr></table><?php
}
?>
</div>
</div>
</div>
</body>
</html
