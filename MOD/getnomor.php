<?php

include "function.php";

$q = strval($_GET['q']);
$hal = strval($_GET['hal']);
$con = connect();
if ($hal == "noagenda"){
    $sql = "select no_agenda from suratmasuk where no_agenda like '%$q%' order by no_agenda desc limit 1";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($result);
    if (mysqli_num_rows($result) == 1){
        $no = explode("/", $data->no_agenda);
        echo $no[0]+1;
    }else{
        echo 1;
    }
}else if ($hal == "nosurat"){
        $sql = "select no_surat from suratkeluar where no_surat like '%$q%' order by no_surat desc limit 1";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_object($result);
        if (mysqli_num_rows($result) == 1){
            $no = explode("/", $data->no_surat);
            echo $no[0]+1;
        }else{
            echo 1;
        }
    }

mysqli_close($con);

?>