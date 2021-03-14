<div class="ct-pnl">
    <div class="t-pnl"><h1>INVENTARIS</h1></div>
    <div class="t-pnl flex">
        <a href="#" class="c-st-ctn"><p><span class="lg-m dsbr"></span>Dasboard</p></a>
        <a href="?hal=DaftarInventaris" class="c-st-ctn"><p><span class="lg-m dftr"></span>Daftar Inventaris</p></a>
        <a href="?hal=Pengadaan" class="c-st-ctn"><p><span class="lg-m pnjn"></span>Pengadaan Barang</p></a>
        <a href="?hal=Pengambilan" class="c-st-ctn"><p><span class="lg-m pinj"></span>Permintaan</p></a>
    </div>
</div>
<div class="cb-pnl">
    <?php
        if ($_GET["hal"]=="DaftarInventaris"){
            include "UMUM/daftarinv.php";
        }else if ($_GET["hal"]=="DetailBarang"){
            include "UMUM/dtbarang.php";
        }else if ($_GET["hal"]=="Pengadaan"){
            include "UMUM/tpengadaan.php";
        }else if ($_GET["hal"]=="DetailPengadaan"){
            include "UMUM/dtpengadaan.php";
        }else if ($_GET["hal"]=="BuatPengadaan"){
            include "FORMULIR/frpengadaan.php";
        }else if ($_GET["hal"]=="TambahBarang"){
            include "FORMULIR/frbarang.php";
        }else if ($_GET["hal"]=="Pengambilan"){
            include "UMUM/tpengambilan.php";
        }
    ?>
</div>