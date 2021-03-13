<html>
<head>
    <link rel="stylesheet" href="/SETNAS/CSS/main.css">
    <script>
       
    </script>
</head>
<body>
    <div class="m-con flex">
        <div class="l-con brad brsol">
            <div class="l-tp flex">
                <div class="con-t">
                    <div class="ft"><img src="../SETNAS/IMG/asset/prfl.png"></div>
                </div>
                <div class="con-t">
                    <h3>Nama</h3>
                    <p>Nama Bagian</p>
                </div>
            </div>
            <div class="l-bt">
                <div class="c-mn">
                    <ul>
                        <li><a href="#"><span class="lg-m brnd"></span>Beranda</a></li>
                        <li><a href="#"><span class="lg-m evnt"></span>Event</a></li>
                        <li><a href="#"><span class="lg-m srt"></span>Surat Menyurat</a></li>
                        <li><a href="#"><span class="lg-m kary"></span>Kepegawaian</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="r-con brad brsol">
            <div class="ct-pnl">
                <div class="t-pnl"><h1>SURAT MENYURAT</h1></div>
                <div class="t-pnl flex">
                    <a href="#" class="c-st-ctn"><p><span class="lg-m dsbr"></span>Dasboard</p></a>
                    <a href="?hal=SuratMasuk" class="c-st-ctn"><p><span class="lg-m in"></span>Surat Masuk</p></a>
                    <a href="?hal=SuratKeluar" class="c-st-ctn"><p><span class="lg-m out"></span>Surat Keluar</p></a>
                </div>
            </div>
            <div class="cb-pnl">
                <?php
                    if ($_GET["hal"]=="SuratMasuk"){
                        include "ADM/tsuratmasuk.php";
                    }else if ($_GET["hal"]=="SuratKeluar"){
                        include "ADM/tsuratkeluar.php";
                    }else if ($_GET["hal"]=="DetailSurat"){
                        include "ADM/dtsuratmasuk.php";
                    }else if ($_GET["hal"]=="SuratBaru"){
                        include "FORMULIR/frsuratkeluar.php";
                    }else if ($_GET["hal"]=="BuatDisposisi"){
                        include "FORMULIR/frsuratmasuk.php";
                    }else if ($_GET["hal"]=="UpdateDisposisi"){
                        include "FORMULIR/frupdatesuratmasuk.php";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>