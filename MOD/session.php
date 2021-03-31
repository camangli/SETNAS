<?php
session_start();
if ($_SESSION['login'] != true ){
    header("location: ../f-login.php", true, 301);
}
?>
