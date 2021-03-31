<?php

$con = connect();
$sqlttlkeluar = "select * from suratkeluar";
$totalkeluar = mysqli_query($con, $sqlttlkeluar);
$sqlttlmasuk = "select * from suratmasuk";
$totalmasuk = mysqli_query($con, $sqlttlmasuk);

$tgl = date("Y-m-d");
$sqlkeluarnow = "select * from suratkeluar where tanggal_surat='$tgl'";
$keluarnow = mysqli_query($con, $sqlkeluarnow);
$sqlmasuknow = "select * from suratmasuk where tanggal_masuk='$tgl'";
$masuknow = mysqli_query($con, $sqlmasuknow);

?>
<div class="flex">
    <a href="?page=SuratMenyurat&hal=SuratMasuk">
    <div class="c-das das-bl brad bshad">
        <h3>Hari ini</h3>
        <div class="das flex">
            <div class="d-das"><h3>Surat Masuk</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($masuknow) ?></h1></div>
        </div>
    </div>
    </a>
    <a href="?page=SuratMenyurat&hal=SuratKeluar">
    <div class="c-das das-rd brad bshad">
        <h3>Hari ini</h3>
        <div class="das flex">
            <div class="d-das"><h3>Surat Keluar</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($keluarnow) ?></h1></div>
        </div>
    </div>
    </a>
    <a href="?page=SuratMenyurat&hal=SuratMasuk">
    <div class="c-das das-gr brad bshad">
        <h3>Total</h3>
        <div class="das flex">
            <div class="d-das"><h3>Surat Masuk</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($totalmasuk) ?></h1></div>
        </div>
    </div>
    </a>
    <a href="?page=SuratMenyurat&hal=SuratKeluar">
    <div class="c-das das-yl brad bshad">
        <h3>Total</h3>
        <div class="das flex">
            <div class="d-das"><h3>Surat Keluar</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($totalkeluar) ?></h1></div>
        </div>
    </div>
    </a>
</div>
