<?php
include('funcao_menu.php');
$id_acao=$_GET['id'];
$registo_acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE id_acao_formacao='$id_acao'");
$area = mysqli_result($registo_acao,0,'id_area_formacao');
$modalidade = mysqli_result($registo_acao,0,'id_modalidade');
$registo_area=mysqli_query(con(),"SELECT * FROM area_formacao WHERE id_area_formacao='$area'");
$registo_mod=mysqli_query(con(),"SELECT * FROM modalidade WHERE id_modalidade='$modalidade'");
?>
<html>
<head>
  <div class="cabec">
    <style>
    th, td {
        text-align: center;
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
<td>artigo 5</td>
<td><b>Artigo 14</b></td>
<td>artigo 14</td>
</tr>
<tr>
<td><b>Formador</b></td>
<td colspan="3">
<?php for($x=0;$x<$) ?>
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
<div class="perfiright"> </div>
   </div>
</body>
</html>
