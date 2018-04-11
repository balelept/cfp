<?php
include('funcao_menu.php');
$id_acao=$_GET['id'];
$registo_acao=mysqli_query(con(),"SELECT * FROM acao_formacao WHERE id_acao_formacao='$id_acao'");
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
     <th text-align="center"> <font size="5"><?php echo mysqli_result($registo_acao,0,'nome'); ?></font> </th>
     </tr>
     </table>
  </div>
 </head>
 <body>
   <div class="corpo">

   </div>
</body>
</html>
