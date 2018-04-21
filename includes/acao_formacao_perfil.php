<?php
include('funcao_menu.php');
$id_acao=$_GET['id'];
$registo_acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE id_acao_formacao='$id_acao'");
$area = mysqli_result($registo_acao,0,'id_area_formacao');
$modalidade = mysqli_result($registo_acao,0,'id_modalidade');
$registo_area=mysqli_query(con(),"SELECT * FROM area_formacao WHERE id_area_formacao='$area'");
$registo_mod=mysqli_query(con(),"SELECT * FROM modalidade WHERE id_modalidade='$modalidade'");
$registo_formador=mysqli_query(con(),"SELECT * FROM formador_acao_formacao WHERE id_acao_formacao='$id_acao'");
$registo_5=mysqli_query(con(),"SELECT * FROM releva WHERE id_acao_formacao='$id_acao' AND id_artigo='5'");
$registo_14=mysqli_query(con(),"SELECT * FROM releva WHERE id_acao_formacao='$id_acao' AND id_artigo='14'");
$registo_edicao=mysqli_query(con(),"SELECT * FROM edicao_formacao WHERE id_acao_formacao='$id_acao'");
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
     <table alling="right"  width="100%" border="0">
     <tr>
     <th text-align="center"> <font size="5"><?php echo mysqli_result($registo_acao,0,'nome'); ?></font> </th>
     </tr>
     </table>
  </div>
 </head>
 <body>
   <div class="corpo">
<div class="perfileft">
<table border="0" width="100%">
<tr>
<td><b>Nome:</b></td>
<td colspan="3"><?php echo mysqli_result($registo_acao,0,'nome'); ?></td>
</tr>
<tr>
<td><b>Subnome</b></td>
<td colspan="3"><?php echo mysqli_result($registo_acao,0,'subnome'); ?></td>
</tr>
<tr>
<td><b>Código</b></td>
<td><?php echo mysqli_result($registo_acao,0,'codigo'); ?></td>
<td><b>Registo acreditação</b></td>
<td><?php echo mysqli_result($registo_acao,0,'reg_acreditacao'); ?></td>
</tr>
<tr>
<td><b>Área</b></td>
<td><?php echo mysqli_result($registo_area,0,'codigo')."|".mysqli_result($registo_area,0,'nome') ?></td>
<td><b>Modalidade</b></td>
<td><?php echo mysqli_result($registo_mod,0,'nome'); ?></td>
</tr>
<tr>
<td><b>Horas Presenciais</b></td>
<td><?php echo mysqli_result($registo_acao,0,'horas_pre'); ?></td>
<td><b>Horas não presenciais</b></td>
<td>
  <?php echo mysqli_result($registo_acao,0,'horas_nao_pre'); ?>
</td>
</tr>
<tr>
<td><b>Data Proposta</b></td>
<td><?php echo date('d/m/Y',strtotime(mysqli_result($registo_acao,0,'data_proposta'))); ?></td>
<td><b>Créditos</b></td>
<td><?php echo mysqli_result($registo_acao,0,'creditos');  ?></td>
</tr>
<tr>
<td><b>Data acreditação</b></td>
<td><?php echo date('d/m/Y',strtotime(mysqli_result($registo_acao,0,'data_acreditacao'))); ?></td>
<td><b>Data Validade</b></td>
<td><?php echo date('d/m/Y',strtotime(mysqli_result($registo_acao,0,'data_validade'))); ?></td>
</tr>
<tr>
<td><b>Artigo 5</b></td>
<td><?php
for($g=0;$g<mysqli_num_rows($registo_5);$g++) {
  $id_grupo=mysqli_result($registo_5,$g,'id_grupos');
  $registo_grupo5=mysqli_query(con(),"SELECT * FROM grupos WHERE id_grupos='$id_grupo' ORDER BY id_grupos ;");
$codigo = mysqli_result($registo_grupo5,0,'codigo');
$nome = mysqli_result($registo_grupo5,0,'nome');
echo $codigo."|".$nome."<br>";  } ?></td>
<td><b>Artigo 14</b></td>
<td align="right" ><?php
for($n=0;$n<mysqli_num_rows($registo_14);$n++) {
  $id_grupo=mysqli_result($registo_14,$n,'id_grupos');
  $registo_grupo14=mysqli_query(con(),"SELECT * FROM grupos WHERE id_grupos='$id_grupo' ORDER BY id_grupos ;");
$codigo = mysqli_result($registo_grupo14,0,'codigo');
$nome = mysqli_result($registo_grupo14,0,'nome');
echo $codigo."|".$nome."<br>";  } ?></td>
</tr>
<tr>
<td><b>Formador</b></td>
<td colspan="3">
<?php for($x=0;$x<mysqli_num_rows($registo_formador);$x++){
     $id_formador=mysqli_result($registo_formador,$x,'id_formador');
     $registo_formando=mysqli_query(con(),"SELECT * FROM formando WHERE id_formando='$id_formador'");
    ?> <a href="formando_perfil.php"> <?php echo mysqli_result($registo_formando,'0','nome'); ?> </a> <?php echo "  |  ";
}
 ?>
</td>
</tr>
<tr>
<td><b>Avaliação</b></td>
<td colspan="3"><?php echo mysqli_result($registo_acao,0,'observacoes');  ?></td>
</tr>
<tr>
<td><b>Observação</b></td>
<td colspan="3"><?php echo mysqli_result($registo_acao,0,'avaliacao');  ?></td>
</tr>
</table>
</div>
<div class="perfiright">
<table border="0" width="100%">

  <?php for($h=0;$h<mysqli_num_rows($registo_edicao);$h++){
       $id_edicao=mysqli_result($registo_edicao,$h,'id_edicao');
       $registo_turma=mysqli_query(con(),"SELECT DISTINCT(id_turma) FROM turma WHERE id_edicao_formacao='$id_edicao'");
       ?> <tr>
           <th bgcolor="#b0ff91"><?php
           $x=$h+1;
           echo "Edição".$x;
           ?></th>
       </tr> <?php
       for($j=0;$j<mysqli_num_rows($registo_turma);$j++){
        ?>
        <tr>
          <td bgcolor="#f7f7f7" cellspacing="2" ><?php
          $x=$j+1;
          $id_turma=mysqli_result($registo_turma,$j,'id_turma');
          echo "Turma".$x;
          ?>
        <a href="pdf_perfil_turma.php?id_turma=<?php echo $id_turma ;?>">  <img src="pauta.ico" height="26" width="26" align="right"> </a>
        <a href="pdf_presencas.php?id_turma=<?php echo $id_turma ;?>">  <img src="pauta.ico" height="26" width="26" align="right"></a>
          <img src="pauta.ico" height="26" width="26" align="right">
        </td>
        </tr>
         <?php
       }
  } ?>

</table>
</div>
   </div>
</body>
</html>
