<?php
session_start();
include "function.php";

$username = $_POST['user'];
$password = $_POST['pass'];
$pwd = md5($password);

ceklogin($username, $pwd);

?>
