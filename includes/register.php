<?php
session_start();
if(isset($_SESSION['login_user'])!="")
{

}
include_once 'connect.php';
if(isset($_POST['btn-signup']))
{
 $uname = mysqli_real_escape_string(con(),$_POST['uname']);
 $upass = md5(mysqli_real_escape_string(con(),$_POST['pass']));
 $confpass = md5(mysqli_real_escape_string(con(),$_POST['confpass']));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resgisto</title>
<link rel="stylesheet" href="style.css" type="text/css" />
   <?php //include('session.php'); ?>  <?php

?>
<div id=nav>
<form method="post">
<table align="center" width="50%" border="0">
<tr>
<td align="right">Nome de utilizador (utilizado no Login):</td><td><input type="text" name="uname" placeholder="UserName" required /></td>
</tr>
<tr>
<td align="right">Password:</td><td><input type="password" name="pass" placeholder="********" required /></td>
</tr>
<tr>
<td align="right">Confirmar Password:</td><td><input type="password" name="confpass" placeholder="********" required /></td>
</tr>
<tr>
<td align="right">&nbsp</td><td><button type="submit" name="btn-signup">Registrar</button></td>
</tr>
<tr>
</tr>
</table>
<?php
if(isset($_POST['btn-signup'])){
    if($_POST['pass'] != $_POST['confpass']){
        echo '<b><span style="color:#ff0000;text-align:center;" >As passwords não coincidem, tente novamente.</span></b>';
    }else{
        $dup = mysqli_query(con(),"SELECT username FROM login WHERE username='".$_POST['uname']."'");
        if(mysqli_num_rows($dup)>0){
            echo '<b><span style="color:#ff0000;text-align:center;" >O nome de Utilizador que inseriu, já existe.</span></b>';
        }        else{
                $url = '../login/inde.php';
                echo '<META HTTP-EQUIV=Refresh CONTENT="5; URL='.$url.'">';
                $sql = mysqli_query(con(),"INSERT INTO login(username,password) VALUES('$uname','$upass')");
echo $uname,$_POST['pass'];
                if($sql){
                 echo '<b><span style="color:#008000;text-align:center;" >Parabéns! Efetuou o registo com sucesso, será encaminhado para a homepage.</span></b>';
                 }
                 else{
                echo '<b><span style="color:#ff0000;text-align:center;" >Erro no registo.</span></b>';
                }
            }
        }
    }

?>
</form>
 </div>
</html>
