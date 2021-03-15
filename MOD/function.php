<?php
$sname = "localhost";
$uname = "root";
$pass = "";
$db = "sekretariat";
$con = new mysqli($sname, $uname, $pass, $db);

function iuser($id){
    $dt = mysqli_query($con, "select * from user where id_karyawan='$id'");
    $us = mysqli_fetch_object($dt);
}
?>