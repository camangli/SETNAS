<?php
include "../MOD/function.php";
include "../MOD/session.php";

$con = connect();
$idkar = $_SESSION['id'];
$sql = "select * from karyawan where id_karyawan='$idkar'";
$q = mysqli_query($con, $sql);
$data = mysqli_fetch_object($q);
?>

<div class="c-tp-pnl">
    <h1>DATA PEGAWAI</h1>
    <?php
        if($_GET["hal"]=="UpdatePegawai"){
            include "FORMULIR/frupdatepegawai.php";
        }else{
            include "UMUM/crdpegawai.php";
        } 
    ?>
      
</div>