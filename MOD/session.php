<?php
session_start();
if ($_SESSION['izin'] != true){
    header("location: ../SETNAS/f-login.php", true, 301);
}
?>
