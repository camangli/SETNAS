<?php
$con = connect();
$idsurat = $_GET['id'];
$sql = "select * from suratkeluar where id_suratkeluar='$idsurat'";
$q = mysqli_query($con, $sql);
$data = mysqli_fetch_object($q);

?>
<div class="c-tp-pnl">
    <h1>DETAIL SURAT KELUAR</h1>
        <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <p class="brad brsol inpt"><?php echo $data->no_surat ?></p>
            </div>
            <div>
                <h3>Tanggal Surat</h3>
                <p class="brad brsol inpt"><?php echo tanggal($data->tanggal_surat) ?></p>
            </div>
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Pengirim</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->nama_pengirim ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->jabatan_pengirim ?></td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->perihal ?></td>
                </tr>
            </table>
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Tujuan</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->nama_tujuan ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->jabatan_tujuan ?></td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td style="width: 10px;">:</td>
                    <td><?php echo $data->instansi_tujuan ?></td>
                </tr>
            </table>
            <div class="c-mn-cb-pnl">
                <a href="?page=SuratMenyurat&hal=Pengiriman&id=<?php echo $data->id_suratkeluar ?>" class="mn-cb-pnl net"><span class="lg-m send"></span>Pengiriman</a>
                <a href="?page=SuratMenyurat&hal=UpdateSuratKeluar&id=<?php echo $data->id_suratkeluar ?>" class="mn-cb-pnl net"><span class="lg-m ubh"></span>Edit</a>
                <a href="ADM/DATA/SuratKeluar/<?php echo $data->nama_file ?>" target="_blank" class="mn-cb-pnl net"><span class="lg-m ctk"></span>Cetak</a>
                <?php echo "<a onClick=\"javascript: return confirm('Apakah Yakin Akan Menghapus Surat');\" href='MOD/hapus.php?q=SuratKeluar&id=$data->id_suratkeluar' class='mn-cb-pnl alrt'><span class='lg-m hps'></span>Hapus</a>";?>
            </div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Isi Surat</p>
            <iframe src="ADM/DATA/SuratKeluar/<?php echo $data->nama_file ?>" type="application/pdf" width="100%" height="500px">
            </iframe>        
        </div>
    </div>
</div>