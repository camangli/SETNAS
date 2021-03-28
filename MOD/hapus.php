<?php
include "../MOD/function.php";

$qv = $_GET['q'];
$idv = $_GET['id'];
$con = connect();
if ($qv == "SuratKeluar"){
    $sql = "select * from suratkeluar where id_suratkeluar='$idv'";
    $q = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($q);
    echo $data->nama_file;
    unlink("../ADM/DATA/SuratKeluar/$data->nama_file");
    mysqli_query($con, "delete from suratkeluar where id_suratkeluar='$idv'");
    header("location: ../?hal=SuratKeluar", true, 301);
}
?>