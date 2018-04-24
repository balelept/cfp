<?php
include ('funcao_menu.php');
$id_turma=$_GET['id_turma'];
$i=$_GET['i'];
$registo_turma=mysqli_query(con(),"SELECT * FROM turma WHERE id_turma='$id_turma'");
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

   <table  width="60%" border="0" align="center">
   <tr>
   <th text-align="center"> <font size="5">Notas da Turma</font> </th>
   </tr>
   </table>
</div>
 </head>
 <body>
<div class="corpo">
  <style>
  table {
      width: 60%;
      font-family: "verdana"
  }
  tr:nth-child(even){background-color: #D1F9B3}

  tr{
      font-size:small;
  }
  </style>

      <style>
  #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 60%;

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
<?php  if($i==1){ ?>
  <table align="center" width="100%" id="customers">
  <tr>
    <th><b>Nome &nbsp</b></th>
    <th><b>Notas &nbsp</b></th>
  </tr>
<?php for($x=0;$x<mysqli_num_rows($registo_turma);$x++){
  ?><tr>
    <td><?php
    $id_formando=mysqli_result($registo_turma,$x,'id_formando');
    $registo_formando=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando'");
    echo mysqli_result($registo_formando,0,'nome');
    ?></td>
    <td> <?php
      echo mysqli_result($registo_turma,0,'nota');
      ?> </td>
  </tr>  <?php
} ?>
  <table width="60%" align="center">
  <tr>
  <td><a href="notas_insert.php?i=2&id_turma=<?php echo $id_turma ;?>"><img src="add.ico" title="Inserir Registo"></a> </td>
  </tr>
 </table>
 <?php
} else if($i==2){?>
  <table align="center" width="100%" id="customers">
  <tr>
    <th><b>Nome &nbsp</b></th>
    <th><b>Notas &nbsp</b></th>
  </tr>
<?php for($x=0;$x<mysqli_num_rows($registo_turma);$x++){
  ?>
  <form method="post" action="notas_insert.php?i=3&id_turma=<?php echo $id_turma ;?>">
  <tr>
    <td><?php
    $id_formando=mysqli_result($registo_turma,$x,'id_formando');

    $registo_formando=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formando'");
    echo mysqli_result($registo_formando,0,'nome').$id_turma;
    ?></td>
    <td>
      <input type="text" name="nota[]"  value="<?php echo mysqli_result($registo_turma,0,'nota'); ?>">
      <input type="hidden" name="formando[]"  value="<?php echo $id_formando ?>">
     </td>
  </tr>  <?php
} ?>
  <table width="60%" align="center">
  <tr >
<td colspan="2" align="center"><input type="submit" class="botao2" value="Atribuir notas" name="btn-signup">  </td>
</tr>
 </table>
<?php
} else if($i==3){
$k=0;
  if(!empty($_POST['formando'])) {
    foreach($_POST['formando'] as $forma) {
      $formando[$k]=$forma;
      $k++;
    }
  }

  $k=0;
  if(!empty($_POST['nota'])) {
    foreach($_POST['nota'] as $nota) {
      $formando2=$formando[$k];
       $editar = "UPDATE turma SET nota='$nota' WHERE id_formando='$formando2' AND id_turma='$id_turma'";
       $result = mysqli_query(con(),$editar);
       $k++;
    }
  }

  if($result){
?>
<table align="center" border="0">
  <tr>
    <td>
      Notas atribuídas com sucesso
    </td>
  </tr>
  <tr>
    <td>
        <a href=<?php echo ".php?id_turma=".$id_turma; ?> class="voltar">Voltar</a>
      </td>
  </tr>
</table>
<?php
  }

}  ?>
</div>
</body>
</html>
