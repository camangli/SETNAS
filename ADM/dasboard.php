<?php
date_default_timezone_set("Asia/Jakarta");
$con = connect();
$sqlttlkeluar = "select * from suratkeluar";
$totalkeluar = mysqli_query($con, $sqlttlkeluar);
$sqlttlmasuk = "select * from suratmasuk";
$totalmasuk = mysqli_query($con, $sqlttlmasuk);

$tgl = date("Y-m-d");
$tahun = date('Y');
$sqlkeluarnow = "select * from suratkeluar where tanggal_surat='$tgl' and tanggal_surat between '$tahun-01-01' and '$tahun-12-31'";
$keluarnow = mysqli_query($con, $sqlkeluarnow);
$sqlmasuknow = "select * from suratmasuk where tanggal_masuk='$tgl' and tanggal_masuk between '$tahun-01-01' and '$tahun-12-31'";
$masuknow = mysqli_query($con, $sqlmasuknow);

?>
<div class="flex">
    <a href="?page=SuratMenyurat&hal=SuratMasuk">
    <div class="c-das das-bl brad bshad">
        <div class="das flex">
            <div class="d-das"><h3>Hari ini</h3><h3>Surat Masuk</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($masuknow) ?></h1></div>
        </div>
    </div>
    </a>
    <a href="?page=SuratMenyurat&hal=SuratKeluar">
    <div class="c-das das-rd brad bshad">
        <div class="das flex">
            <div class="d-das"><h3>Hari ini</h3><h3>Surat Keluar</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($keluarnow) ?></h1></div>
        </div>
    </div>
    </a>
    <a href="?page=SuratMenyurat&hal=SuratMasuk">
    <div class="c-das das-gr brad bshad">
        <div class="das flex">
            <div class="d-das"><h3>Total</h3><h3>Surat Masuk</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($totalmasuk) ?></h1></div>
        </div>
    </div>
    </a>
    <a href="?page=SuratMenyurat&hal=SuratKeluar">
    <div class="c-das das-yl brad bshad">
        <div class="das flex">
            <div class="d-das"><h3>Total</h3><h3>Surat Keluar</h3></div>
            <div class="d-das"><h1><?php echo mysqli_num_rows($totalkeluar) ?></h1></div>
        </div>
    </div>
    </a>
</div>
