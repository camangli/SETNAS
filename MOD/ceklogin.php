<?php
session_start();
include "function.php";

$username = $_POST['user'];
$password = $_POST['pass'];
$pwd = md5($password);

$sql = mysqli_query($con, "select * from user where email='$username' AND password='$pwd'");
$jml = mysqli_num_rows($sql);


if($jml >= 1){
	$_SESSION['izin']=true;
	header("location: /?hal=home", true, 301);
}else{
echo "<script language='javascript'>alert('Usernama atau password salah')</script>";
	header("location: f-login.php", true, 301);
}
?>
