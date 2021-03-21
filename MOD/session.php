<?php
session_start();
if ($_SESSION['login'] != true ){
    header("location: ../SETNAS/f-login.php", true, 301);
}
?>
