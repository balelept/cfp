<?php
function con(){
    $con = new mysqli("localhost", "root", "", "db_cfp");
    return $con;
}


$servidor = "localhost";
$utilizador = "root";
$password = "";
$ligacao = mysqli_connect($servidor, $utilizador, $password) or die(mysqli_error());

mysqli_select_db ($ligacao,"db_cfp");


?>
