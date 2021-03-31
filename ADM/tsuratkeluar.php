<?php
    $con = connect();
    $no = 1;
    if(isset($_POST['cari']) && isset($_POST['tglawal']) && isset($_POST['tglakhir'])){
        $qcari = $_POST['cari'];
        $tglawal = $_POST['tglawal'];
        $tglakhir = $_POST['tglakhir'];
    }
?>
<div class="flex">
    <div>
        <div class="c-mn-cb-pnl">
            <a  class="mn-cb-pnl" href="?page=SuratMenyurat&hal=SuratBaru"><span class="lg tbh"></span>Surat Baru</a>
        </div>
    </div>
    <div>
    <form action="?page=SuratMenyurat&hal=SuratKeluar" method="POST" enctype="multipart/form-data">
       <div class="flex">
        <div class="c-src">
            <div class="brsol brad c-tgp-src">
                <input type="text" class="inpt" value="<?php echo $qcari ?>" placeholder="Cari Surat" name="cari"/>
                <input type="submit" value="">   
            </div>
        </div>
        <div class="c-src">
            Filter 
            <input type="date" name='tglawal' value="<?php echo $tglawal ?>" class="brsol brad date"> s/d
            <input type="date" name='tglakhir' value="<?php echo $tglakhir ?>" class="brsol brad date">
            <input type="submit" class="btn brsad" value="Tampilkan">   
        </div>
       </div>
        </form>
    </div>
</div>
<table>
    <tr>
        <th style="width: 150px;">No. Surat</th>
        <th style="width: 200px;">Tujuan</th>
        <th>Perihal</th>
        <th style="width: 80px;">Status</th>
        <th style="width: 80px;">Action</th>
    </tr>
    <?php
        if($tglawal != null and $tglakhir != null){
            $and = "and";
            $antara = "tanggal_surat between '$tglawal' and '$tglakhir'";
        }

        if($qcari != null){  
            $qw = 'perihal';
            $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
            if(mysqli_num_rows($sql1) == null){
                $qw = 'no_surat';
                $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                if(mysqli_num_rows($sql1) == null){
                    $qw = 'tanggal_surat';
                    $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                    if(mysqli_num_rows($sql1) == null){
                        $qw = 'kepengurusan';
                        $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                        if(mysqli_num_rows($sql1) == null){
                            $qw = 'nama_pengirim';
                            $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                            if(mysqli_num_rows($sql1) == null){
                                $qw = 'jabatan_pengirim';
                                $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                                if(mysqli_num_rows($sql1) == null){
                                    $qw = 'nama_tujuan';
                                    $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                                    if(mysqli_num_rows($sql1) == null){
                                        $qw = 'jabatan_tujuan';
                                        $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                                        if(mysqli_num_rows($sql1) == null){
                                            $qw = 'instansi_tujuan';
                                            $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $qw like '%$qcari%' $and $antara order by tanggal_surat asc");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            while($data1 = mysqli_fetch_object($sql1)){
                $tgl = $data1->tanggal_surat;
                $ltgl = tanggal($tgl);
                echo "<tr>
                <th class='sb-tjdl' colspan='5'>$ltgl</th>
                </tr>";
                $no++;
                $no2 = 1;
                $sql2 = mysqli_query($con, "select * from suratkeluar where tanggal_surat='$tgl' and $qw like '%$qcari%'");
                while($data2 = mysqli_fetch_object($sql2)){
                    $sql3 = mysqli_query($con, "select * from pengiriman where id_suratkeluar='$data2->id_suratkeluar'");
                    $jml = mysqli_num_rows($sql3);
                    if ($jml == 1){
                     $stts = "<p><a class='terkirim' href=?page=SuratMenyurat&hal=Pengiriman&id=$data2->id_suratkeluar><span class='lg-m stj'></span>Terkirim</a></p></td>";
                    }else{
                     $stts = "<p><a class='belumterkirim' href=?page=SuratMenyurat&hal=Pengiriman&id=$data2->id_suratkeluar><span class='lg-m tstj'></span>Belum</a></p></td>";   
                    }
                    echo "<tr>
                    <td style='width: 150px;'>$data2->no_surat</td>
                    <td style='width: 200px;'>$data2->nama_tujuan<br><b>$data2->jabatan_tujuan<br>$data2->instansi_tujuan</b></td>
                    <td>$data2->perihal</td>
                    <td style='width: 80px;'>$stts
                    <td style='width: 80px;'><a href='?page=SuratMenyurat&hal=DetailSuratKeluar&id=$data2->id_suratkeluar' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                    </tr>";
                    $no2++;
                }
            }
        }else if($qcari == null and $tglawal != null and $tglakhir != null){
            $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar where $antara order by tanggal_surat asc");
            while($data1 = mysqli_fetch_object($sql1)){
                $tgl = $data1->tanggal_surat;
                $ltgl = tanggal($tgl);
                echo "<tr>
                <th class='sb-tjdl' colspan='5'>$ltgl</th>
                </tr>";
                $no++;
                $no2 = 1;
                $sql2 = mysqli_query($con, "select * from suratkeluar where tanggal_surat='$tgl'");
                while($data2 = mysqli_fetch_object($sql2)){
                    $sql3 = mysqli_query($con, "select * from pengiriman where id_suratkeluar='$data2->id_suratkeluar'");
                    $jml = mysqli_num_rows($sql3);
                    if ($jml == 1){
                     $stts = "<p><a class='terkirim' href=?page=SuratMenyurat&hal=Pengiriman&id=$data2->id_suratkeluar><span class='lg-m stj'></span>Terkirim</a></p></td>";
                    }else{
                     $stts = "<p><a class='belumterkirim' href=?page=SuratMenyurat&hal=Pengiriman&id=$data2->id_suratkeluar><span class='lg-m tstj'></span>Belum</a></p></td>";   
                    }
                    echo "<tr>
                    <td style='width: 150px;'>$data2->no_surat</td>
                    <td style='width: 200px;'>$data2->nama_tujuan<br><b>$data2->jabatan_tujuan<br>$data2->instansi_tujuan</b></td>
                    <td>$data2->perihal</td>
                    <td style='width: 80px;'>$stts
                    <td style='width: 80px;'><a href='?page=SuratMenyurat&hal=DetailSuratKeluar&id=$data2->id_suratkeluar' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                    </tr>";
                    $no2++;
                }
            }
        }else{  
            $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar order by tanggal_surat desc limit 7");
            while($data1 = mysqli_fetch_object($sql1)){
                $tgl = $data1->tanggal_surat;
                $ltgl = tanggal($tgl);
                echo "<tr>
                <th class='sb-tjdl' colspan='5'>$ltgl</th>
                </tr>";
                $no++;
                $no2 = 1;
                $sql2 = mysqli_query($con, "select * from suratkeluar where tanggal_surat='$tgl'");
                while($data2 = mysqli_fetch_object($sql2)){
                    $sql3 = mysqli_query($con, "select * from pengiriman where id_suratkeluar='$data2->id_suratkeluar'");
                    $jml = mysqli_num_rows($sql3);
                    if ($jml == 1){
                     $stts = "<p><a class='terkirim' href=?page=SuratMenyurat&hal=Pengiriman&id=$data2->id_suratkeluar><span class='lg-m stj'></span>Terkirim</a></p></td>";
                    }else{
                     $stts = "<p><a class='belumterkirim' href=?page=SuratMenyurat&hal=Pengiriman&id=$data2->id_suratkeluar><span class='lg-m tstj'></span>Belum</a></p></td>";   
                    }
                    echo "<tr>
                    <td style='width: 150px;'>$data2->no_surat</td>
                    <td style='width: 200px;'>$data2->nama_tujuan<br><b>$data2->jabatan_tujuan<br>$data2->instansi_tujuan</b></td>
                    <td>$data2->perihal</td>
                    <td style='width: 80px;'>$stts
                    <td style='width: 80px;'><a href='?page=SuratMenyurat&hal=DetailSuratKeluar&id=$data2->id_suratkeluar' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                    </tr>";
                    $no2++;
                }
            }
        }
    ?>
</table>