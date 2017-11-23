<?php
session_start(); // Starting Session
include_once '../includes/connect.php';
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Utilizador ou palavra-chave incorretas.";
} else {
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// To protect MySQL injection for Security purpose
$username = mysqli_real_escape_string(con(),$username);
$password = md5(mysqli_real_escape_string(con(),$password));
// Selecting Database
echo $password;
$db = mysqli_select_db(con(),"cfp");
// SQL query to fetch information of registerd users and finds user match.
//$query = mysqli_query(con(),"SELECT * FROM login WHERE password='$password' AND username='$username'");
$query = mysqli_query(con(),"SELECT * FROM login WHERE username='$username' AND password='$password'");
if (!$query || mysqli_num_rows($query) == 0){
$rows = 0;
} else {
$rows = 1;
}
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: ../menu/index.html"); // Redirecting To Other Page
} else {
$error = "Utilizador ou palavra-chave incorretas.";
}
mysqli_close(con()); // Closing Connection
}
}
?>
