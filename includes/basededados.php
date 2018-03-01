<?php
include('funcao_menu.php');

?>
<html>
<head>
<div class="cabec">
  <table  width="100%" heigh="100%" border="0">
<tr>
<th text-align="center"> <font size="5">Base de Dados</font> </th>
</tr>
</table>
</div>
 </head>
 <body>
  <div class="corpo">
   <style media="screen" type="text/css">
table {
  width: 100%;
  height: 15%;
}
td{
  width: 25%;
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
<div class="corpo">
  <table border="0">
    <tr>
<td>
<div class="wrapper">
  <form method="get" action="centros.php">
    <button class="button" allign="center">Centros de formaçao</button>
</form>
</div>
</td>
<td>
<div class="wrapper">
  <form method="get" action="agrupamentos.php">
  <button class="button" allign="center">Agrupamentos</button>
  </form>
</div>
</td>
<td>
<div class="wrapper">
  <form method="get" action="escolas.php">
  <button class="button" allign="center">Escolas</button>
  </form>
</div>
</td>
<td>
<div class="wrapper">
  <form method="get" action="escalao.php">
  <button class="button" allign="center">Escalões</button>
  </form>
</div>
</td>
</tr>
<tr>
<td>
<div class="wrapper">
  <button class="button" allign="center">Button</button>
</div>
</td>
<td>
  <div class="wrapper">
<form method="get" action="modalidade.php">
<button class="button" allign="center">Modalidade</button>
</form>
</div>
</td>
<td>
  <div class="wrapper">
<form method="get" action="grupos.php">
<button class="button" allign="center">Grupos</button>
</form>
</div>
</td>
<td>
  <div class="wrapper">
<form method="get" action="habilitacao.php">
<button class="button" allign="center">Habilitações</button>
</form>
</div>
</td>
    </tr>
    <tr>
    <td>
      <div class="wrapper">
    <form method="get" action="area_formacao.php">
    <button class="button" allign="center">area</button>
    </form>
    </div>
    </td>
    <td>
      <div class="wrapper">
    <form method="get" action="escola.php">
    <button class="button" allign="center">Escola</button>
    </form>
    </div>
    </td>
        </tr>
</div>
</body>
</div>
</html>
