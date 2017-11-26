<!DOCTYPE html>
<html >
<head>
  <?php
  include('php/login2.php'); // Includes Login Script
  include('../includes/result.php');
  if(isset($_SESSION['login_user'])){
  header("Refresh:0; url=../menu/index.php");
}
  ?>
  <meta charset="UTF-8">
  <title>Calm breeze login screen</title>



      <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <script type="text/javascript">

 function erro(){
 alert("<?php echo $error; ?> ");
 }


 </script>
<font size="2px"><span style="color:#ff0000;text-align:center;" ><?php if( $error == "Utilizador ou palavra-chave incorretas."){ ?><script> erro() </script><?php }  ?> </span></font></td>


  <div class="wrapper">
	<div class="container">
		<h1>Bem vindo</h1>
    <form action="" method="post">
      <input id="name" name="username" placeholder="Utilizador" type="text" size=auto>
        <input id="password" name="password" placeholder="**********" size="auto" type="password">
        <input name="submit" type="submit" value="Login" align="center" class="botao2">
       </form>
	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
    <script type="text/javascript">

function erro(){
  alert("<?php echo $error; ?> ");
}

</script>
</body>
</html>
