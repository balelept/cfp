<?php
include('funcao_menu.php');
$registo_area=mysqli_query(con(),"SELECT * FROM area_formacao ORDER BY id_area_formacao");
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
   <table  width="100%" border="0">
   <tr>
   <th text-align="center"> <font size="5">Formador</font> </th>
   </tr>
   </table>
</div>
 </head>
 <body>
   <div class="corpo">
     <table width="100%" border="1">
     <?php for($i=0;$i<mysqli_num_rows($registo_formando);$i++){
     ?>
     <tr>
     <td>
     <?php
     $id =mysqli_result($registo_formando,$i,'id_formando');
     echo $id;
     ?>
     </td>
     <td><a href="formador_insert.php?i=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
     </tr>
     <?php
     }
     ?>
     </table>
     <?php
     $fase=$_GET['i'];


 ?>
 </div>
</body>
<html>
