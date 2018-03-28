<?php
include('funcao_menu.php');
$registo_acao=mysqli_query(con(),"SELECT * FROM acao_formacao ORDER BY data_validade DESC");
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
     <th text-align="center"> <font size="5">Centros de formacão de professoress</font> </th>
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
       <th><b>Id &nbsp</b></th>
       <th><b>Nome &nbsp</b></th>
       <th><b>Codigo &nbsp</b></th>
       <th><b>Validade &nbsp</b></th>
       <th><b>Edicao &nbsp</b></th>
       <th><b>Editar &nbsp</b></th>
       <th><b>Eliminar &nbsp</b></th>
     </tr>
     <?php for($i=0;$i<mysqli_num_rows($registo_acao);$i++){
     ?>
     <tr>
     <td>
     <?php
     $id =mysqli_result($registo_acao,$i,'id_acao_formacao');
     echo $id;
     ?>
     </td>
     <td>
     <?php
     $nome=mysqli_result($registo_acao,$i,'nome');
     echo $nome;
     ?>
     </td>
     <td>
     <?php
     $cod=mysqli_result($registo_acao,$i,'codigo');
     echo $cod;
     ?>
     </td>
     <td>
          <?php
   $hoje= date("Y-m-d");
   $validade=mysqli_result($registo_acao,$i,'data_validade');
   if($hoje<= $validade){   ?>
   <img src="certo_verde.png">
   <?php } else { ?>
   <img src="certo_gray.png"> <?php } ?>

   </td>
<td>
   <div id="container">

      <?php
      $registos_edicao_formacao=mysqli_query(con(),"SELECT * FROM edicao_formacao WHERE '$id'=id_acao_formacao ;");
      if(!$registos_edicao_formacao){ $d=0; }else{
      $d=mysqli_num_rows($registos_edicao_formacao);}
     ?>
  <img id="iamage" src="edicoes.png" >
   <font color="black">  <?php echo $d;?> </font>
   <?php  if($hoje<= $validade){   ?>
   <a  href="edicao_insert.php?i=1&id_acao=<?php echo $id;?>">  <img src="insert.png" hspace="10" title> </a>
  <?php } ?>
 </div>
</td>
     <td><a href="acao_formacao_edit.php?e=1&id=<?php echo $id ?>"><img src="edit.ico" width="16px" height="16px"> </td>
     <td><a href="acao_formacao_delete.php?d=1&id=<?php echo $id ?>"><img src="delete.ico" width="16px" height="16px"> </a> </td>
     </tr>
     <?php
     }
     ?>
     </table>
     <table>
     <tr>
     <td><a href="acao_formacao_insert.php?i=1"><img src="add.ico" title="Inserir Registo"></a> </td>
     </tr>
     </table>
     <div class="down">
       <table aling="center" width="100%" border="0">
       <tr>
       <td>
         <p style="font-size:120%;"><?php echo "Inserir uma ação:" ?>

       <a href="acao_formacao_insert.php?i=1" ><img src="insert.png"  ></a></p>
     </td>
       <td>
         <p style="font-size:120%;"><?php echo "Criar uma edição: " ?>
       <a href="inserir_edicao1.php" ><img src="insert.png"  ></a></p>
     </td>
       <td>
         <p style="font-size:120%;"><?php echo "Criar uma Turma: " ?>
       <a href="inserir_turma1.php" ><img src="insert.png"  ></a></p>
     </td>
       </tr>
       </table>
     </div>
   </div>
</body>
</html>
