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
    th, td {
        text-align: left;
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
<td colspan="2"><?php echo mysqli_result($registo_acao,0,'nome'); ?></td>
</tr>
<tr>
<th><b>Data do ínicio:</b></th>
<td><?php echo mysqli_result($registo_edicao,0,'data_inicio'); ?></td>
  <th><b>Data do fim</b></th>
  <td><?php echo mysqli_result($registo_edicao,0,'data_fim'); ?></td>
  </tr>
<tr>
<th><b>Formadores</b></th>
<td>
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
<td><?php echo mysqli_result($registo_edicao,0,'data_inicio'); ?></td>
</tr>

</table>
</div>
   </div>
</body>
</html>
