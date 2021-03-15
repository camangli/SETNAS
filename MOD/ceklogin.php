<?php
session_start();
include "function.php";

$username = $_POST['user'];
$password = $_POST['pass'];
$pwd = md5($password);

$sql = mysqli_query($con, "select * from user where id_user='$username' AND password='$pwd'");
$jml = mysqli_num_rows($sql);
$is = mysqli_fetch_object($sql);
if($jml >= 1){
	session_name($is->id_karyawan);
	$_SESSION['izin']=true;
	header("location: ../../SETNAS/?hal=home", true, 301);
}else{

	echo "<script language='javascript'>alert('Usernama atau password salah')</script>";
	header("location: ../../SETNAS/f-login.php", true, 301);
}
?>
