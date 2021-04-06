<?php

include "function.php";

$q = strval($_GET['q']);
$hal = strval($_GET['hal']);
$con = connect();
$tahun = date('Y');
if ($hal == "noagenda"){
    $sql = "select no_agenda from suratmasuk where no_agenda like '%$q%' and tanggal_masuk between '$tahun-01-01' and '$tahun-12-31'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($result);
    $data = mysqli_fetch_object($result);
        if (mysqli_num_rows($result) >= 1){
            echo mysqli_num_rows($result) + 1;
    }else{
        echo 1;
    }
}else if ($hal == "nosurat"){
        $sql = "select no_surat from suratkeluar where no_surat like '%$q%' and tanggal_surat between '$tahun-01-01' and '$tahun-12-31'";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_object($result);
        if (mysqli_num_rows($result) >= 1){
            echo mysqli_num_rows($result) + 1;
        }else{
            echo 1;
        }
    }

mysqli_close($con);

?>