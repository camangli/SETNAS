<?php
include "../MOD/function.php";
include "../MOD/session.php";

$con = connect();
$idsurat = $_GET['id'];
$idkar = $_SESSION['id'];
$sql = "select * from suratmasuk where id_suratmasuk='$idsurat'";
$sql2 = "select * from tanggapan where id_suratmasuk='$idsurat'";
$q = mysqli_query($con, $sql);
$q2 = mysqli_query($con, $sql2);
$data = mysqli_fetch_object($q);
?>
<div class="c-tp-pnl">
    <h1>DETAIL SURAT MASUK</h1>
        <div class="flex">
            <div>
                <h3>No. Agenda</h3>
                <p class="brad brsol inpt"><?php echo $data->no_agenda ?></p>
            </div>
            <div>
                <h3>Tanggal Masuk</h3>
                <p class="brad brsol inpt"><?php echo tanggal($data->tanggal_masuk) ?></p>
            </div>
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Pengirim</p>
            <table>
                <tr>
                    <td>Tanggal Surat</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo tanggal($data->tanggal_surat) ?></td>
                </tr>
                <tr>
                    <td>No. Surat</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->no_surat ?></td>
                </tr>
                    <td>Nama</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->nama ?></td>
                </tr>
                </tr>
                    <td>Jabatan</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->jabatan ?></td>
                </tr>
                </tr>
                    <td>Instansi</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->instansi ?></td>
                </tr>
                </tr>
                    <td>Perihal</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->perihal ?></td>
                </tr>
            </table>
            <div class="c-mn-cb-pnl">
            <a href="?page=SuratMenyurat&hal=UpdateSuratMasuk&id=<?php echo $data->id_suratmasuk ?>" class="mn-cb-pnl net"><span class="lg-m ubh"></span>Edit</a>
            <a href="ADM/DATA/SuratMasuk/<?php echo $data->nama_file ?>" target="_blank" class="mn-cb-pnl net"><span class="lg-m ctk"></span>Cetak Surat</a>
            <a href="MOD/pdf.php?id=<?php echo $data->id_suratmasuk ?>" target="_blank" class="mn-cb-pnl net"><span class="lg-m ctk"></span>Cetak Lembar Disposisi</a>
            <?php echo "<a onClick=\"javascript: return confirm('Apakah Yakin Akan Menghapus Surat');\" href='MOD/hapus.php?q=SuratMasuk&id=$data->id_suratmasuk' class='mn-cb-pnl alrt'><span class='lg-m hps'></span>Hapus</a>";?>
            </div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Tanggapan/Masukan SETNAS</p>
            <div class="c-cont-frame brad brsol">
                <div class="c-tgp">
                    <?php
                        while ($data2 = mysqli_fetch_object($q2)){
                            $sql3 = "select * from karyawan where id_karyawan='$data2->id_karyawan'";
                            $q3 = mysqli_query($con, $sql3);
                            $data3 = mysqli_fetch_object($q3);
                            $tgl = $data2->waktu_tanggapan;
                            $tglonly = tanggal($tgl);
                            $tglwkt = tglwkt($tgl);
                            date_default_timezone_set("Asia/Jakarta");
                            if(tanggal(date("Y-m-d")) == $tglonly){
                                $vtgl = $tglwkt;
                            }else{
                                $vtgl = "$tglonly, $tglwkt";
                            }
                            if($data3->id_karyawan == $idkar){
                                $del =  " - <a class='plc-hps' href='MOD/hapus.php?q=Tanggapan&id=$data2->id_tanggapan'>Hapus</a>";
                            } else {
                                $del = "";
                            }
                            echo "
                            <div class='i-tgp'>
                                <h4>$data3->nama</h4>
                                <p>$data2->tanggapan</p>
                                <p class='plc'>$vtgl WIB $del</p>
                            </div>";
                        }
                    ?>
                </div>
                <div class="c-tgp brsad">
                    <div class="brsol brad c-tgp-txt">
                        <form action="MOD/upload.php?hal=Tanggapan&id=<?php echo $data->id_suratmasuk ?>" class="flex" method="POST" enctype="multipart/form-data">
                        <textarea placeholder="Tanggapan/Masukan" name="tanggapan"></textarea>
                            <input type="submit" value="">
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Isi Surat</p>
            <iframe src="ADM/DATA/SuratMasuk/<?php echo $data->nama_file ?>" type="application/pdf" width="100%" height="500px">
            </iframe>            
        </div>
    </div>
</div>