<?php
    $con = connect();
    $no = 1;
    $qcari = $_POST['cari'];
    $tglawal = $_POST['tglawal'];
    $tglakhir = $_POST['tglakhir'];
    
?>
<div class="flex">
    <div>
        <div class="c-mn-cb-pnl">
            <a  class="mn-cb-pnl" href="?page=SuratMenyurat&hal=BuatDisposisi"><span class="lg tbh"></span>Buat Disposisi</a>
        </div>
    </div>
    <div>
    <form action="?page=SuratMenyurat&hal=SuratMasuk" method="POST" enctype="multipart/form-data">
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
        <th style="width: 200px;">Pengirim</th>
        <th style="width: 100px;">Tanggal Surat</th>
        <th>Perihal</th>
        <th style="width: 80px;">Action</th>
    </tr>  
    <?php
        if($tglawal != null and $tglakhir != null){
            $and = "and";
            $antara = "tanggal_masuk between '$tglawal' and '$tglakhir'";
        }

        if($qcari != null){  
            $qw = 'perihal';
            $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
            if(mysqli_num_rows($sql1) == null){
                $qw = 'no_agenda';
                $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
                if(mysqli_num_rows($sql1) == null){
                    $qw = 'no_surat';
                    $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
                    if(mysqli_num_rows($sql1) == null){
                        $qw = 'jenis_surat';
                        $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
                        if(mysqli_num_rows($sql1) == null){
                            $qw = 'nama';
                            $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
                            if(mysqli_num_rows($sql1) == null){
                                $qw = 'jabatan';
                                $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
                                if(mysqli_num_rows($sql1) == null){
                                    $qw = 'instansi';
                                    $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $qw like '%$qcari%' $and $antara order by tanggal_surat desc");
                                }
                            }
                        }
                    }
                }
            }
            while($data1 = mysqli_fetch_object($sql1)){
                $tgl = $data1->tanggal_masuk;
                $ltgl = tanggal($tgl);
                echo "<tr>
                <th class='sb-tjdl' colspan='5'>$ltgl</th>
                </tr>";
                $no++;
                $no2 = 1;
                $sql2 = mysqli_query($con, "select * from suratmasuk where tanggal_masuk='$tgl'and $qw like '%$qcari%'");
                while($data2 = mysqli_fetch_object($sql2)){
                    $tglformat = tanggal($data2->tanggal_surat);
                    echo "
                    <tr>
                    <td style='width: 150px;'>$data2->no_surat</td>
                    <td style='width: 200px;'>$data2->nama<br><b>$data2->jabatan<br>$data2->instansi</td>
                    <td style='width: 100px;'>$tglformat</td>
                    <td>$data2->perihal</td>
                    <td style='width: 80px;'><a href='?page=SuratMenyurat&hal=DetailSuratMasuk&id=$data2->id_suratmasuk' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                    </tr> ";
                    $no2++;
                }
            }
        }else if($qcari == null and $tglawal != null and $tglakhir != null){
            $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk where $antara order by tanggal_surat desc");
            while($data1 = mysqli_fetch_object($sql1)){
                $tgl = $data1->tanggal_masuk;
                $ltgl = tanggal($tgl);
                echo "<tr>
                <th class='sb-tjdl' colspan='5'>$ltgl</th>
                </tr>";
                $no++;
                $no2 = 1;
                $sql2 = mysqli_query($con, "select * from suratmasuk where tanggal_masuk='$tgl'");
                while($data2 = mysqli_fetch_object($sql2)){
                    $tglformat = tanggal($data2->tanggal_surat);
                    echo "
                    <tr>
                    <td style='width: 150px;'>$data2->no_surat</td>
                    <td style='width: 200px;'>$data2->nama<br><b>$data2->jabatan<br>$data2->instansi</td>
                    <td style='width: 100px;'>$tglformat</td>
                    <td>$data2->perihal</td>
                    <td style='width: 80px;'><a href='?page=SuratMenyurat&hal=DetailSuratMasuk&id=$data2->id_suratmasuk' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                    </tr> ";
                    $no2++;
                }
            }
        }else{  
            $sql1 = mysqli_query($con, "select distinct tanggal_masuk from suratmasuk order by tanggal_masuk desc limit 7");
            while($data1 = mysqli_fetch_object($sql1)){
                $tgl = $data1->tanggal_masuk;
                $ltgl = tanggal($tgl);
                echo "<tr>
                <th class='sb-tjdl' colspan='5'>$ltgl</th>
                </tr>";
                $no++;
                $no2 = 1;
                $sql2 = mysqli_query($con, "select * from suratmasuk where tanggal_masuk='$tgl'");
                while($data2 = mysqli_fetch_object($sql2)){
                    $tglformat = tanggal($data2->tanggal_surat);
                    echo "
                    <tr>
                    <td style='width: 150px;'>$data2->no_surat</td>
                    <td style='width: 200px;'>$data2->nama<br><b>$data2->jabatan<br>$data2->instansi</td>
                    <td style='width: 100px;'>$tglformat</td>
                    <td>$data2->perihal</td>
                    <td style='width: 80px;'><a href='?page=SuratMenyurat&hal=DetailSuratMasuk&id=$data2->id_suratmasuk' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                    </tr> ";
                    $no2++;
                }
            }
        }
    ?>
</table>