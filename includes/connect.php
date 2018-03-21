<?php
function con(){
    $con = new mysqli("localhost", "root", "", "db_cfp");
    return $con;
}
function cone(){
    $servidor = "localhost";
    $utilizador = "root";
    $password = "";
    $ligacao = mysqli_connect($servidor, $utilizador, $password) or die(mysqli_error());
    return $ligacao;
}


$servidor = "localhost";
$utilizador = "root";
$password = "";
$ligacao = mysqli_connect($servidor, $utilizador, $password) or die(mysqli_error());

mysqli_select_db ($ligacao,"db_cfp");


?>
