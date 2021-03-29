<html>
<head>
    <link rel="stylesheet" href="/SETNAS/CSS/main.css">
    <script>
       
    </script>
    <?php
        include "MOD/function.php";
        include "MOD/session.php";
    ?>
</head>
<body>
    <div class="m-con flex">
        <div class="l-con brad brsol">
            <div class="l-tp flex">
                <div class="con-t">
                    <div class="ft"><img src="../SETNAS/IMG/asset/Profile/<?php $foto = foto($_SESSION['id']); echo $foto ?>"></div>
                </div>
                <div class="con-t">
                    <h3><?php $user = iuser($_SESSION['id']); echo $user?></h3>
                    <p><?php $jabatan = ibagian($_SESSION['id']); echo $jabatan?></p>
                </div>
            </div>
            <div class="l-bt">
                <div class="c-mn">
                    <ul>
                        <li><a href="#"><span class="lg brnd"></span>Beranda</a></li>
                        <li><a href="#"><span class="lg evnt"></span>Event</a></li>
                        <li><a href="?page=SuratMenyurat"><span class="lg srt"></span>Surat Menyurat</a></li>
                        <li><a href="?page=Kepegawaian"><span class="lg kary"></span>Kepegawaian</a></li>
                        <li><a href="?hal=logout"><span class="lg lgout"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="r-con brad brsol">
            <?php
                if($_GET['page'] == 'SuratMenyurat'){
                    include 'ADM/SuratMenyurat.php';
                }else if($_GET['page']== 'Kepegawaian'){
                    include "UMUM/dtpegawai.php";
                }
            ?>
        </div>
    </div>
</body>
</html>