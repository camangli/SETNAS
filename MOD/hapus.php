<?php
include "../MOD/function.php";

$qv = $_GET['q'];
$idv = $_GET['id'];
$con = connect();
if ($qv == "SuratKeluar"){
    $sql = "select * from suratkeluar where id_suratkeluar='$idv'";
    $q = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($q);
    unlink("../ADM/DATA/SuratKeluar/$data->nama_file");
    mysqli_query($con, "delete from suratkeluar where id_suratkeluar='$idv'");
    header("location: ../?page=SuratMenyurat&hal=SuratKeluar", true, 301);
}else if ($qv == "SuratMasuk"){
    $sql = "select * from suratmasuk where id_suratmasuk='$idv'";
    $q = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($q);
    unlink("../ADM/DATA/SuratMasuk/$data->nama_file");
    mysqli_query($con, "delete from suratmasuk where id_suratmasuk='$idv'");
    header("location: ../?page=SuratMenyurat&hal=SuratMasuk", true, 301);
}else if ($qv == "Tanggapan"){
    $sql = "select * from tanggapan where id_tanggapan='$idv'";
    $q = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($q);
    mysqli_query($con, "delete from tanggapan where id_tanggapan='$idv'");
    header("location: ../?page=SuratMenyurat&hal=DetailSuratMasuk&id=$data->id_suratmasuk", true, 301);
}
?>