<div class="ct-pnl">
                <div class="t-pnl"><h1>SURAT MENYURAT</h1></div>
                <div class="t-pnl flex">
                    <a href="?page=SuratMenyurat" class="c-st-ctn"><p><span class="lg dsbr"></span>Dasboard</p></a>
                    <a href="?page=SuratMenyurat&hal=SuratMasuk" class="c-st-ctn"><p><span class="lg in"></span>Surat Masuk</p></a>
                    <a href="?page=SuratMenyurat&hal=SuratKeluar" class="c-st-ctn"><p><span class="lg out"></span>Surat Keluar</p></a>
                </div>
            </div>
            <div class="cb-pnl">
                <?php
                    if ($_GET["hal"]=="SuratMasuk"){
                        include "ADM/tsuratmasuk.php";
                    }else if ($_GET["hal"]=="SuratKeluar"){
                        include "ADM/tsuratkeluar.php";
                    }else if ($_GET["hal"]=="DetailSuratMasuk"){
                        include "ADM/dtsuratmasuk.php";
                    }else if ($_GET["hal"]=="DetailSuratKeluar"){
                        include "ADM/dtsuratkeluar.php";
                    }else if ($_GET["hal"]=="SuratBaru"){
                        include "FORMULIR/frsuratkeluar.php";
                    }else if ($_GET["hal"]=="BuatDisposisi"){
                        include "FORMULIR/frsuratmasuk.php";
                    }else if ($_GET["hal"]=="UpdateSuratMasuk"){
                        include "FORMULIR/frupdatesuratmasuk.php";
                    }else if ($_GET["hal"]=="UpdateSuratKeluar"){
                        include "FORMULIR/frupdatesuratkeluar.php";
                    }else if ($_GET["hal"]=="Pengiriman"){
                        include "FORMULIR/frpengiriman.php";
                    }else if ($_GET["hal"]=="UpdatePengiriman"){
                        include "FORMULIR/frupdatepengiriman.php";
                    }else if ($_GET["hal"]=="hapus"){
                        include "MOD/hapus.php";
                    }else{
                        include "ADM/dasboard.php";
                    }
                ?>
            </div>